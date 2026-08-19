<!-- Chatbot Widget -->
<style>
    :root {
        --cb-primary: #ff6b1a;
        --cb-primary-hover: #e85a0c;
        --cb-bg: #ffffff;
        --cb-shadow: 0 10px 40px rgba(0,0,0,0.15);
        --cb-text: #334155;
        --cb-bot-msg: #f1f5f9;
        --cb-user-msg: #ff6b1a;
    }

    #chatbot-widget {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 9999;
        font-family: inherit;
    }

    .cb-toggle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--cb-primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(255, 107, 26, 0.4);
        transition: transform 0.3s ease;
        border: none;
        outline: none;
    }
    .cb-toggle:hover {
        transform: scale(1.05);
        background: var(--cb-primary-hover);
    }
    .cb-toggle svg {
        transition: transform 0.3s ease;
    }

    .cb-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 350px;
        max-width: calc(100vw - 48px);
        height: 500px;
        max-height: calc(100vh - 120px);
        background: var(--cb-bg);
        border-radius: 20px;
        box-shadow: var(--cb-shadow);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        opacity: 0;
        pointer-events: none;
        transform: translateY(20px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        transform-origin: bottom right;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .cb-window.cb-active {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0) scale(1);
    }

    .cb-header {
        background: var(--cb-primary);
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .cb-avatar {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    .cb-title {
        flex-grow: 1;
    }
    .cb-title h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: white;
    }
    .cb-title p {
        margin: 0;
        font-size: 12px;
        opacity: 0.9;
    }
    .cb-close {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        opacity: 0.8;
        padding: 4px;
    }
    .cb-close:hover {
        opacity: 1;
    }

    .cb-messages {
        flex-grow: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
        background: #fafafa;
    }

    .cb-msg {
        max-width: 85%;
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 14px;
        line-height: 1.5;
        animation: cb-fade-in 0.3s ease forwards;
        opacity: 0;
        transform: translateY(10px);
    }
    @keyframes cb-fade-in {
        to { opacity: 1; transform: translateY(0); }
    }
    .cb-msg-bot {
        background: var(--cb-bot-msg);
        color: var(--cb-text);
        border-bottom-left-radius: 4px;
        align-self: flex-start;
    }
    .cb-msg-user {
        background: var(--cb-user-msg);
        color: white;
        border-bottom-right-radius: 4px;
        align-self: flex-end;
    }

    .cb-options {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 8px;
        align-self: flex-start;
        width: 100%;
    }
    .cb-option-btn {
        background: white;
        border: 1px solid var(--cb-primary);
        color: var(--cb-primary);
        padding: 10px 16px;
        border-radius: 100px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-align: left;
        transition: all 0.2s ease;
    }
    .cb-option-btn:hover {
        background: var(--cb-primary);
        color: white;
    }

    .cb-input-area {
        padding: 16px;
        background: white;
        border-top: 1px solid #e2e8f0;
        display: flex;
        gap: 8px;
    }
    .cb-input {
        flex-grow: 1;
        border: 1px solid #cbd5e1;
        border-radius: 100px;
        padding: 10px 16px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    .cb-input:focus {
        border-color: var(--cb-primary);
    }
    .cb-send {
        background: var(--cb-primary);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
    }
    .cb-send:hover {
        background: var(--cb-primary-hover);
    }
    .cb-send:disabled {
        background: #cbd5e1;
        cursor: not-allowed;
    }

    .cb-typing {
        display: flex;
        gap: 4px;
        padding: 12px 16px;
        background: var(--cb-bot-msg);
        border-radius: 16px;
        border-bottom-left-radius: 4px;
        align-self: flex-start;
        width: fit-content;
    }
    .cb-typing span {
        width: 6px;
        height: 6px;
        background: #94a3b8;
        border-radius: 50%;
        animation: cb-bounce 1.4s infinite ease-in-out both;
    }
    .cb-typing span:nth-child(1) { animation-delay: -0.32s; }
    .cb-typing span:nth-child(2) { animation-delay: -0.16s; }
    @keyframes cb-bounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1); }
    }
</style>

<div id="chatbot-widget">
    <button class="cb-toggle" id="cbToggle" aria-label="Open Chat">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="cbIconChat"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="cbIconClose" style="display:none; position:absolute;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </button>

    <div class="cb-window" id="cbWindow">
        <div class="cb-header">
            <div class="cb-avatar">RS</div>
            <div class="cb-title">
                <h4>RS Orange Tech</h4>
                <p>We typically reply in a few minutes</p>
            </div>
            <button class="cb-close" id="cbCloseBtn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        
        <div class="cb-messages" id="cbMessages">
            <!-- Messages will be injected here via JS -->
        </div>

        <form class="cb-input-area" id="cbForm" style="display:none;">
            <input type="text" class="cb-input" id="cbInput" placeholder="Type your reply..." required autocomplete="off">
            <button type="submit" class="cb-send" id="cbSend" disabled>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left:-2px;margin-top:2px;"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cbToggle = document.getElementById('cbToggle');
    const cbWindow = document.getElementById('cbWindow');
    const cbCloseBtn = document.getElementById('cbCloseBtn');
    const cbIconChat = document.getElementById('cbIconChat');
    const cbIconClose = document.getElementById('cbIconClose');
    const cbMessages = document.getElementById('cbMessages');
    const cbForm = document.getElementById('cbForm');
    const cbInput = document.getElementById('cbInput');
    const cbSend = document.getElementById('cbSend');

    let isOpen = false;
    let hasOpened = false;
    let currentStep = 0;

    const leadData = {
        subject: '',
        name: '',
        phone: '',
        email: '',
        message: ''
    };

    // Toggle Chat Window
    function toggleChat() {
        isOpen = !isOpen;
        hasOpened = true;
        if (isOpen) {
            cbWindow.classList.add('cb-active');
            cbIconChat.style.display = 'none';
            cbIconClose.style.display = 'block';
            if (currentStep === 0) {
                startConversation();
            }
        } else {
            cbWindow.classList.remove('cb-active');
            cbIconChat.style.display = 'block';
            cbIconClose.style.display = 'none';
        }
    }

    cbToggle.addEventListener('click', toggleChat);
    cbCloseBtn.addEventListener('click', () => { if(isOpen) toggleChat(); });

    // Auto-open after 5 seconds
    setTimeout(() => {
        if (!hasOpened && !isOpen) {
            toggleChat();
        }
    }, 5000);

    // Helpers
    const scrollToBottom = () => {
        cbMessages.scrollTop = cbMessages.scrollHeight;
    };

    const showTyping = () => {
        const typing = document.createElement('div');
        typing.className = 'cb-typing';
        typing.id = 'cbTypingIndicator';
        typing.innerHTML = '<span></span><span></span><span></span>';
        cbMessages.appendChild(typing);
        scrollToBottom();
    };

    const hideTyping = () => {
        const typing = document.getElementById('cbTypingIndicator');
        if (typing) typing.remove();
    };

    const addBotMessage = (text, delay = 600) => {
        return new Promise(resolve => {
            showTyping();
            setTimeout(() => {
                hideTyping();
                const msg = document.createElement('div');
                msg.className = 'cb-msg cb-msg-bot';
                msg.innerHTML = text;
                cbMessages.appendChild(msg);
                scrollToBottom();
                resolve();
            }, delay);
        });
    };

    const addUserMessage = (text) => {
        const msg = document.createElement('div');
        msg.className = 'cb-msg cb-msg-user';
        msg.textContent = text;
        cbMessages.appendChild(msg);
        scrollToBottom();
    };

    const showOptions = (options) => {
        const wrapper = document.createElement('div');
        wrapper.className = 'cb-options';
        options.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'cb-option-btn';
            btn.textContent = opt.label;
            btn.onclick = () => {
                wrapper.remove();
                addUserMessage(opt.label);
                leadData.subject = opt.value;
                currentStep = 1;
                processStep();
            };
            wrapper.appendChild(btn);
        });
        cbMessages.appendChild(wrapper);
        scrollToBottom();
    };

    // Flow Logic
    async function startConversation() {
        await addBotMessage("Hi there! 👋 Welcome to RS Orange Tech.");
        await addBotMessage("How can our team help you today?", 800);
        showOptions([
            { label: "Request a Quote / Sales", value: "Sales & Leads" },
            { label: "Technical Support", value: "Support" },
            { label: "General Inquiry", value: "General Inquiry" }
        ]);
    }

    async function processStep() {
        cbForm.style.display = 'flex';
        cbInput.value = '';
        cbInput.disabled = true;

        if (currentStep === 1) {
            await addBotMessage("Great! What is your full name?");
            cbInput.type = 'text';
            cbInput.placeholder = "E.g. Jane Doe";
        } else if (currentStep === 2) {
            await addBotMessage(`Nice to meet you, ${leadData.name.split(' ')[0]}! What is your phone/mobile number?`);
            cbInput.type = 'tel';
            cbInput.placeholder = "E.g. +91 98765 43210";
        } else if (currentStep === 3) {
            await addBotMessage("And what is your email address?");
            cbInput.type = 'email';
            cbInput.placeholder = "E.g. jane@example.com";
        } else if (currentStep === 4) {
            await addBotMessage("Please type your message or requirements below:");
            cbInput.type = 'text';
            cbInput.placeholder = "Type your message...";
        } else if (currentStep === 5) {
            cbForm.style.display = 'none';
            await submitLead();
            return;
        }

        cbInput.disabled = false;
        cbInput.focus();
    }

    // Form Handling
    cbInput.addEventListener('input', () => {
        cbSend.disabled = cbInput.value.trim() === '';
    });

    cbForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const val = cbInput.value.trim();
        if (!val) return;

        addUserMessage(val);
        
        if (currentStep === 1) leadData.name = val;
        if (currentStep === 2) leadData.phone = val;
        if (currentStep === 3) leadData.email = val;
        if (currentStep === 4) leadData.message = val;

        currentStep++;
        processStep();
    });

    // API Submission
    async function submitLead() {
        await addBotMessage("Sending your message to our team...", 400);
        
        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            // If CSRF token is missing from head, try to grab one from a form if it exists
            let csrfToken = token;
            if (!csrfToken) {
                const csrfInput = document.querySelector('input[name="_token"]');
                if (csrfInput) csrfToken = csrfInput.value;
            }

            const response = await fetch('/chatbot-submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken || '',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(leadData)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                await addBotMessage("✅ Thank you! Your message has been received. Our team will get back to you shortly.");
                setTimeout(() => toggleChat(), 4000); // Auto close after 4s
            } else {
                throw new Error("Validation Failed");
            }
        } catch (error) {
            await addBotMessage("⚠️ Oops! Something went wrong. Please try contacting us via the Contact page.");
        }
    }
});
</script>
