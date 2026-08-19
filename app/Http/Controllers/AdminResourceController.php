<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminResourceController extends Controller
{
    public function index(Request $request, string $resource)
    {
        $section = $this->section($resource);
        $query = $section['model']::query();

        if ($resource === 'posts') {
            $query->with('category');
        }

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($builder) use ($section, $search): void {
                foreach ($section['search'] as $column) {
                    $builder->orWhere($column, 'like', '%'.$search.'%');
                }
            });
        }

        foreach ($section['fields'] as $field) {
            if (isset($field['type']) && $field['type'] === 'select' && $request->filled($field['name'])) {
                $query->where($field['name'], $request->input($field['name']));
            }
        }

        return view('admin.resource', [
            'slug' => $resource,
            'section' => $section,
            'records' => $query->latest()->paginate(12)->withQueryString(),
        ]);
    }

    public function create(string $resource)
    {
        $section = $this->section($resource);

        return view('admin.form', [
            'slug' => $resource,
            'section' => $section,
            'record' => new $section['model'],
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request, string $resource)
    {
        $section = $this->section($resource);
        $data = $this->validated($request, $resource, $section);

        foreach ($section['fields'] as $field) {
            $name = $field['name'];
            $type = $field['type'] ?? 'text';

            if (($type === 'file' || $type === 'image') && $request->hasFile($name)) {
                $data[$name] = $this->storeUploadedPortfolioAsset($request->file($name));
            }
        }

        if ($resource === 'users') {
            $data['password'] = Hash::make($data['password']);
        }

        $section['model']::create($data);

        return redirect()->route('admin.'.$resource)->with('status', $section['title'].' saved.');
    }

    public function edit(string|int $id, string $resource)
    {
        $section = $this->section($resource);

        return view('admin.form', [
            'slug' => $resource,
            'section' => $section,
            'record' => $section['model']::findOrFail($id),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, string|int $id, string $resource)
    {
        $section = $this->section($resource);
        /** @var Model $record */
        $record = $section['model']::findOrFail($id);
        $data = $this->validated($request, $resource, $section, $record);

        foreach ($section['fields'] as $field) {
            $name = $field['name'];
            $type = $field['type'] ?? 'text';

            if (($type === 'file' || $type === 'image') && $request->hasFile($name)) {
                $data[$name] = $this->storeUploadedPortfolioAsset($request->file($name));
            }
        }

        if ($resource === 'users') {
            if (($data['password'] ?? null) !== null) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
        }

        $record->update($data);

        return redirect()->route('admin.'.$resource)->with('status', $section['title'].' updated.');
    }

    public function destroy(string|int $id, string $resource)
    {
        $section = $this->section($resource);
        $section['model']::findOrFail($id)->delete();

        return redirect()->route('admin.'.$resource)->with('status', $section['title'].' deleted.');
    }

    private function section(string $resource): array
    {
        abort_unless(array_key_exists($resource, config('admin.resources')), 404);

        return config('admin.resources')[$resource];
    }

    private function validated(Request $request, string $resource, array $section, ?Model $record = null): array
    {
        $rules = [];

        foreach ($section['fields'] as $field) {
            $name = $field['name'];
            $fieldRules = [];
            $type = $field['type'] ?? 'text';
            $fieldRules[] = ($field['required'] ?? false) && ! ($resource === 'users' && $name === 'password' && $record) ? 'required' : 'nullable';

            if ($type === 'email') {
                $fieldRules[] = 'email';
            }

            if ($type === 'category') {
                $fieldRules[] = 'exists:categories,id';
            } elseif ($type === 'datetime-local') {
                $fieldRules[] = 'date';
            } elseif ($type === 'file' || $type === 'image') {
                $fieldRules[] = 'file';
                $fieldRules[] = 'image';
                $fieldRules[] = 'max:2048';
            } else {
                $fieldRules[] = 'string';
            }

            if (in_array($name, ['slug', 'email', 'url', 'key'], true)) {
                $table = (new $section['model'])->getTable();
                $fieldRules[] = Rule::unique($table, $name)->ignore($record?->getKey());
            }

            if ($name === 'password') {
                $fieldRules = [$record ? 'nullable' : 'required', 'string', 'min:8'];
            }

            $rules[$name] = $fieldRules;
        }

        return $request->validate($rules);
    }

    private function storeUploadedPortfolioAsset($file): string
    {
        $directory = public_path('site-assets/portfolio');

        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');
        $filename = time().'-'.Str::slug($originalName ?: 'portfolio').'.'.$extension;

        $file->move($directory, $filename);

        return 'portfolio/'.$filename;
    }
}
