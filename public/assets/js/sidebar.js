// ===== SIDEBAR.JS — Collapsible Sidebar =====

function initSidebar() {
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('sidebar-toggle');
  if (!sidebar) return;

  const STORAGE_KEY = 'sidebar_collapsed';
  const isCollapsed = localStorage.getItem(STORAGE_KEY) === 'true';

  if (isCollapsed) {
    sidebar.classList.add('collapsed');
    updateToggleBtnIcon(true);
  }

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      const collapsed = sidebar.classList.toggle('collapsed');
      localStorage.setItem(STORAGE_KEY, collapsed);
      updateToggleBtnIcon(collapsed);
    });
  }

  // Add tooltips for collapsed state
  document.querySelectorAll('.nav-item[data-page]').forEach(item => {
    const label = item.querySelector('.nav-label');
    if (label) {
      item.setAttribute('title', label.textContent.trim());
    }
  });

  // Click navigation
  document.querySelectorAll('.nav-item[data-page]').forEach(item => {
    item.addEventListener('click', () => {
      const page = item.dataset.page;
      if (page && !item.classList.contains('active')) {
        window.location.href = page;
      }
    });
  });
}

function updateToggleBtnIcon(collapsed) {
  const btn = document.getElementById('sidebar-toggle');
  if (!btn) return;
  const icon = btn.querySelector('.toggle-icon');
  const label = btn.querySelector('.toggle-label');
  if (icon) icon.textContent = collapsed ? '»' : '«';
  if (label) label.textContent = collapsed ? '' : 'Collapse';
}
