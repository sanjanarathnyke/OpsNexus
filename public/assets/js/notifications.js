// ===== NOTIFICATIONS.JS — Notification Bell & Feed =====

const NOTIFICATIONS_DATA = [
  { id: 1, avatar: 'JD', color: '#4f8ef7', text: '<strong>@john</strong> pushed new commit to <span class="repo-name">main</span> in <strong>ERP_SYSTEM</strong>', time: '2 minutes ago', unread: true, type: 'push' },
  { id: 2, avatar: 'DK', color: '#8b5cf6', text: '<strong>@dave</strong> opened pull request <strong>#24</strong> in <strong>MOBILE_APP</strong>', time: '15 minutes ago', unread: true, type: 'pr' },
  { id: 3, avatar: 'SA', color: '#22c55e', text: '<strong>@sarah</strong> merged branch <code>feature-auth</code> into <strong>main</strong> in <strong>API_SERVICE</strong>', time: '1 hour ago', unread: true, type: 'merge' },
  { id: 4, avatar: 'MR', color: '#f59e0b', text: '<strong>@mike</strong> created branch <code>hotfix-payment</code> in <strong>SITE1</strong>', time: '3 hours ago', unread: false, type: 'branch' },
  { id: 5, avatar: 'AL', color: '#ef4444', text: '<strong>@alice</strong> commented on pull request <strong>#19</strong> in <strong>DASHBOARD</strong>', time: '5 hours ago', unread: false, type: 'comment' },
  { id: 6, avatar: 'JD', color: '#4f8ef7', text: '<strong>@john</strong> pushed 3 commits to <strong>develop</strong> in <strong>CRM_APP</strong>', time: '8 hours ago', unread: false, type: 'push' },
  { id: 7, avatar: 'DK', color: '#8b5cf6', text: '<strong>@dave</strong> closed issue <strong>#55</strong> in <strong>MOBILE_APP</strong>', time: '1 day ago', unread: false, type: 'issue' },
  { id: 8, avatar: 'SA', color: '#22c55e', text: '<strong>@sarah</strong> deployed <strong>v2.3.0</strong> to production in <strong>API_SERVICE</strong>', time: '1 day ago', unread: false, type: 'deploy' },
];

document.addEventListener('DOMContentLoaded', () => {
  initNotificationBell();
  renderNotificationFeed();
});

function initNotificationBell() {
  const bell = document.getElementById('notif-bell');
  if (!bell) return;

  bell.addEventListener('click', () => {
    const unread = NOTIFICATIONS_DATA.filter(n => n.unread).length;
    if (unread > 0) {
      showToast && showToast('info', `You have ${unread} unread notifications`);
    }
  });

  // Update badge count
  const badge = document.querySelector('.notif-dot');
  const unreadCount = NOTIFICATIONS_DATA.filter(n => n.unread).length;
  if (badge && unreadCount === 0) badge.style.display = 'none';
}

function renderNotificationFeed() {
  const feed = document.getElementById('notification-feed');
  if (!feed) return;

  const typeIcons = {
    push: '⬆', pr: '🔀', merge: '✓', branch: '⎇',
    comment: '💬', issue: '●', deploy: '🚀'
  };

  feed.innerHTML = NOTIFICATIONS_DATA.map(n => `
    <div class="group relative p-5 hover:bg-gray-50:bg-slate-800/50 transition-colors flex items-start space-x-4 notif-item ${n.unread ? 'bg-orange-50/30' : ''}" data-id="${n.id}">
      <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full flex items-center justify-center text-white font-bold shadow-sm" style="background: ${n.color}">
        ${n.avatar}
      </div>
      <div class="flex-1 min-w-0">
        <p class="text-sm text-gray-800">
          ${n.text.replace(/<strong>/g, '<span class="font-semibold text-gray-900">').replace(/<\/strong>/g, '</span>').replace(/<span class="repo-name">/g, '<span class="font-semibold text-orange-600">').replace(/<code>/g, '<span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">').replace(/<\/code>/g, '</span>')}
        </p>
        <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
          <span>${typeIcons[n.type] || '•'}</span>
          <span>&middot;</span>
          <span class="whitespace-nowrap">${n.time}</span>
        </div>
      </div>
      ${n.unread ? `<div class="flex-shrink-0 mt-3 notif-unread-dot">
        <span class="h-2.5 w-2.5 rounded-full bg-orange-600 inline-block shadow-sm ring-2 ring-white"></span>
      </div>` : ''}
    </div>
  `).join('');

  feed.querySelectorAll('.notif-item').forEach(item => {
    item.addEventListener('click', () => {
      const id = parseInt(item.dataset.id);
      const notif = NOTIFICATIONS_DATA.find(n => n.id === id);
      if (notif && notif.unread) {
        notif.unread = false;
        item.classList.remove('bg-orange-50/30', '');
        const dot = item.querySelector('.notif-unread-dot');
        if (dot) dot.remove();
      }
    });
  });
}

function markAllRead() {
  NOTIFICATIONS_DATA.forEach(n => n.unread = false);
  document.querySelectorAll('.notif-item').forEach(item => {
    item.classList.remove('bg-orange-50/30', '');
    const dot = item.querySelector('.notif-unread-dot');
    if (dot) dot.remove();
  });
  const notifDot = document.querySelector('.notif-dot');
  if (notifDot) notifDot.style.display = 'none';
  showToast && showToast('success', 'All notifications marked as read');
}

window.markAllRead = markAllRead;
