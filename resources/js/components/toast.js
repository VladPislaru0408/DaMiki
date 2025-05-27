
// This function accepts a message and an icon, updates the toast element,
// and displays it for a short duration. The toast fades in and out smoothly.

export function showToast(message, icon = '📋') {
    const toast = document.getElementById('toast');
    const toastIcon = toast.querySelector('#toast-icon');
    const toastMessage = toast.querySelector('#toast-message');

    if (toastIcon && toastMessage) {
        toastIcon.textContent = icon;
        toastMessage.textContent = message;
    } else {
        toast.textContent = `${icon} ${message}`;
    }

    toast.classList.remove('opacity-0');
    toast.classList.add('opacity-100');

    setTimeout(() => {
        toast.classList.remove('opacity-100');
        toast.classList.add('opacity-0');
    }, 2500);
}

export function handleClick(type, value) {
    const label = type === 'map' ? 'Address' : type === 'tel' ? 'Phone' : 'Email';

    if (type === 'mailto' || type === 'tel') {
        window.location.href = `${type}:${value}`;
        setTimeout(() => {
            if (document.hasFocus()) {
                navigator.clipboard.writeText(value).then(() => {
                    showToast(`✅ ${label} copied!`);
                });
            }
        }, 1000);
        return;
    }

    let win = null;
    try {
        win = window.open(value, '_blank');
    } catch (e) {
        console.warn('Window blocked or failed:', e);
    }

    setTimeout(() => {
        if (document.visibilityState !== 'visible' || !document.hasFocus()) return;

        try {
            if (!win || win.closed || typeof win.closed === 'undefined') {
                navigator.clipboard.writeText(value).then(() => {
                    showToast(`✅ ${label} copied!`);
                }).catch(() => {
                    showToast(`❌ Could not copy ${label}.`);
                });
            }
        } catch (e) {
            console.warn('Clipboard fallback skipped due to window access restriction:', e);
        }
    }, 500);
}
// This code defines two functions: showToast and handleClick.
// showToast displays a toast notification with a message and an optional icon.