// ===== APP.JS — Global App Initialization =====

document.addEventListener('DOMContentLoaded', () => {
  initSidebar();
  initHeader();
  initProfileDropdown();
  highlightActiveNav();
});

function highlightActiveNav() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-item[data-page]').forEach(item => {
    if (item.dataset.page === currentPage) {
      item.classList.add('active');
    }
  });
}

function initHeader() {
  // Workspace badge click
  const workspaceBadge = document.querySelector('.workspace-badge');
  if (workspaceBadge) {
    workspaceBadge.addEventListener('click', () => {
      showToast('info', 'Workspace: DevHub Pro');
    });
  }
}

function initProfileDropdown() {
  const profileBtn = document.querySelector('.profile-btn');
  const dropdown = document.querySelector('.profile-dropdown');
  if (!profileBtn || !dropdown) return;

  profileBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    dropdown.classList.toggle('open');
  });

  document.addEventListener('click', () => dropdown.classList.remove('open'));
  dropdown.addEventListener('click', e => e.stopPropagation());
}

// ===== TOAST NOTIFICATIONS =====
function showToast(type, message, duration = 3000) {
  let container = document.getElementById('toast-container');
  if (!container) {
    container = document.createElement('div');
    container.id = 'toast-container';
    container.style.cssText = `
      position: fixed; bottom: 24px; right: 24px; z-index: 9999;
      display: flex; flex-direction: column; gap: 10px;
    `;
    document.body.appendChild(container);
  }

  const icons = { success: '✓', danger: '✕', info: 'ℹ', warning: '⚠' };
  const colors = {
    success: '#22c55e',
    danger: '#ef4444',
    info: '#4f8ef7',
    warning: '#f59e0b'
  };

  const toast = document.createElement('div');
  toast.style.cssText = `
    display: flex; align-items: center; gap: 10px;
    background: #1a1d27; color: #fff;
    border-left: 4px solid ${colors[type] || colors.info};
    border-radius: 8px; padding: 12px 18px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.25);
    font-size: 13px; font-weight: 500; min-width: 240px;
    animation: slideInRight 0.3s ease;
  `;

  const icon = document.createElement('span');
  icon.style.cssText = `color: ${colors[type] || colors.info}; font-weight: 700; font-size: 15px;`;
  icon.textContent = icons[type] || icons.info;

  const text = document.createElement('span');
  text.textContent = message;

  toast.appendChild(icon);
  toast.appendChild(text);
  container.appendChild(toast);

  setTimeout(() => {
    toast.style.animation = 'slideOutRight 0.3s ease';
    toast.addEventListener('animationend', () => toast.remove());
  }, duration);
}

// Inject keyframes
const style = document.createElement('style');
style.textContent = `
@keyframes slideInRight {
  from { opacity: 0; transform: translateX(30px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes slideOutRight {
  from { opacity: 1; transform: translateX(0); }
  to { opacity: 0; transform: translateX(30px); }
}
`;
document.head.appendChild(style);

window.showToast = showToast;
