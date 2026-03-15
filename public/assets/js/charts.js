// ===== CHARTS.JS — Chart Rendering with Canvas API =====

document.addEventListener('DOMContentLoaded', () => {
  renderProjectProgressChart();
  renderDevActivityChart();
  renderRevenueLineChart();
});

// ===== BAR CHART — Project Progress =====
function renderProjectProgressChart() {
  const canvas = document.getElementById('projectProgressChart');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  canvas.width = canvas.offsetWidth * window.devicePixelRatio;
  canvas.height = canvas.offsetHeight * window.devicePixelRatio;
  ctx.scale(window.devicePixelRatio, window.devicePixelRatio);

  const W = canvas.offsetWidth;
  const H = canvas.offsetHeight;

  const data = [65, 82, 45, 90, 58, 73, 88, 50, 67, 95, 40, 76];
  const labels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const barColors = ['#4f8ef7','#6ba3f7','#4f8ef7','#3b7de0','#6ba3f7','#4f8ef7','#3b7de0','#6ba3f7','#4f8ef7','#3b7de0','#6ba3f7','#4f8ef7'];

  const padding = { top: 20, bottom: 36, left: 40, right: 16 };
  const chartW = W - padding.left - padding.right;
  const chartH = H - padding.top - padding.bottom;
  const barGap = chartW / data.length;
  const barWidth = barGap * 0.55;

  // Grid lines
  ctx.strokeStyle = '#e8ecf0';
  ctx.lineWidth = 1;
  for (let i = 0; i <= 4; i++) {
    const y = padding.top + (chartH / 4) * i;
    ctx.beginPath();
    ctx.moveTo(padding.left, y);
    ctx.lineTo(W - padding.right, y);
    ctx.stroke();
    ctx.fillStyle = '#9ca3af';
    ctx.font = '10px Inter, sans-serif';
    ctx.textAlign = 'right';
    ctx.fillText(`${100 - i * 25}%`, padding.left - 6, y + 4);
  }

  // Bars
  data.forEach((val, i) => {
    const x = padding.left + i * barGap + (barGap - barWidth) / 2;
    const barH = (val / 100) * chartH;
    const y = padding.top + chartH - barH;

    const grad = ctx.createLinearGradient(0, y, 0, y + barH);
    grad.addColorStop(0, '#4f8ef7');
    grad.addColorStop(1, '#c7deff');
    ctx.fillStyle = grad;

    // Rounded top
    const r = 4;
    ctx.beginPath();
    ctx.moveTo(x + r, y);
    ctx.lineTo(x + barWidth - r, y);
    ctx.quadraticCurveTo(x + barWidth, y, x + barWidth, y + r);
    ctx.lineTo(x + barWidth, y + barH);
    ctx.lineTo(x, y + barH);
    ctx.lineTo(x, y + r);
    ctx.quadraticCurveTo(x, y, x + r, y);
    ctx.closePath();
    ctx.fill();

    // Label
    ctx.fillStyle = '#9ca3af';
    ctx.font = '9px Inter, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(labels[i], x + barWidth / 2, H - padding.bottom + 14);
  });
}

// ===== LINE CHART — Developer Activity =====
function renderDevActivityChart() {
  const canvas = document.getElementById('devActivityChart');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  canvas.width = canvas.offsetWidth * window.devicePixelRatio;
  canvas.height = canvas.offsetHeight * window.devicePixelRatio;
  ctx.scale(window.devicePixelRatio, window.devicePixelRatio);

  const W = canvas.offsetWidth;
  const H = canvas.offsetHeight;

  const datasets = [
    { data: [12, 19, 8, 24, 15, 28, 22, 30, 18, 25, 20, 35], color: '#4f8ef7', label: 'Commits' },
    { data: [5, 8, 3, 12, 7, 15, 10, 18, 9, 14, 11, 20], color: '#8b5cf6', label: 'PRs' }
  ];

  const padding = { top: 20, bottom: 40, left: 40, right: 16 };
  const chartW = W - padding.left - padding.right;
  const chartH = H - padding.top - padding.bottom;
  const labels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const maxVal = 40;

  // Grid
  ctx.strokeStyle = '#e8ecf0';
  ctx.lineWidth = 1;
  for (let i = 0; i <= 4; i++) {
    const y = padding.top + (chartH / 4) * i;
    ctx.beginPath();
    ctx.moveTo(padding.left, y);
    ctx.lineTo(W - padding.right, y);
    ctx.stroke();
    ctx.fillStyle = '#9ca3af';
    ctx.font = '10px Inter, sans-serif';
    ctx.textAlign = 'right';
    ctx.fillText(maxVal - (maxVal / 4) * i, padding.left - 6, y + 4);
  }

  datasets.forEach(ds => {
    const points = ds.data.map((val, i) => ({
      x: padding.left + (i / (ds.data.length - 1)) * chartW,
      y: padding.top + chartH - (val / maxVal) * chartH
    }));

    // Area fill
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].y);
    for (let i = 1; i < points.length; i++) {
      const cpx = (points[i - 1].x + points[i].x) / 2;
      ctx.bezierCurveTo(cpx, points[i - 1].y, cpx, points[i].y, points[i].x, points[i].y);
    }
    ctx.lineTo(points[points.length - 1].x, padding.top + chartH);
    ctx.lineTo(points[0].x, padding.top + chartH);
    ctx.closePath();
    const areaGrad = ctx.createLinearGradient(0, padding.top, 0, padding.top + chartH);
    areaGrad.addColorStop(0, ds.color + '40');
    areaGrad.addColorStop(1, ds.color + '05');
    ctx.fillStyle = areaGrad;
    ctx.fill();

    // Line
    ctx.beginPath();
    ctx.strokeStyle = ds.color;
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.moveTo(points[0].x, points[0].y);
    for (let i = 1; i < points.length; i++) {
      const cpx = (points[i - 1].x + points[i].x) / 2;
      ctx.bezierCurveTo(cpx, points[i - 1].y, cpx, points[i].y, points[i].x, points[i].y);
    }
    ctx.stroke();

    // Dots
    points.forEach(pt => {
      ctx.beginPath();
      ctx.arc(pt.x, pt.y, 3, 0, Math.PI * 2);
      ctx.fillStyle = '#fff';
      ctx.fill();
      ctx.strokeStyle = ds.color;
      ctx.lineWidth = 2;
      ctx.stroke();
    });
  });

  // X Labels
  labels.forEach((label, i) => {
    const x = padding.left + (i / (labels.length - 1)) * chartW;
    ctx.fillStyle = '#9ca3af';
    ctx.font = '9px Inter, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(label, x, H - padding.bottom + 14);
  });

  // Legend
  datasets.forEach((ds, i) => {
    const lx = padding.left + i * 80;
    const ly = H - 8;
    ctx.fillStyle = ds.color;
    ctx.fillRect(lx, ly - 7, 12, 4);
    ctx.fillStyle = '#6b7280';
    ctx.font = '10px Inter, sans-serif';
    ctx.textAlign = 'left';
    ctx.fillText(ds.label, lx + 16, ly - 3);
  });
}

// ===== LINE CHART — Revenue (used in payments page) =====
function renderRevenueLineChart() {
  const canvas = document.getElementById('revenueChart');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  canvas.width = canvas.offsetWidth * window.devicePixelRatio;
  canvas.height = canvas.offsetHeight * window.devicePixelRatio;
  ctx.scale(window.devicePixelRatio, window.devicePixelRatio);

  const W = canvas.offsetWidth;
  const H = canvas.offsetHeight;

  const data = [28000, 32000, 29000, 45000, 38000, 52000, 48000, 61000, 55000, 70000, 65000, 82000];
  const labels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const padding = { top: 20, bottom: 36, left: 60, right: 16 };
  const chartW = W - padding.left - padding.right;
  const chartH = H - padding.top - padding.bottom;
  const maxVal = 90000;

  // Grid
  ctx.strokeStyle = '#e8ecf0';
  ctx.lineWidth = 1;
  for (let i = 0; i <= 4; i++) {
    const y = padding.top + (chartH / 4) * i;
    ctx.beginPath();
    ctx.moveTo(padding.left, y);
    ctx.lineTo(W - padding.right, y);
    ctx.stroke();
    ctx.fillStyle = '#9ca3af';
    ctx.font = '10px Inter, sans-serif';
    ctx.textAlign = 'right';
    const val = maxVal - (maxVal / 4) * i;
    ctx.fillText(`$${(val / 1000).toFixed(0)}k`, padding.left - 6, y + 4);
  }

  const points = data.map((val, i) => ({
    x: padding.left + (i / (data.length - 1)) * chartW,
    y: padding.top + chartH - (val / maxVal) * chartH
  }));

  // Area
  ctx.beginPath();
  ctx.moveTo(points[0].x, points[0].y);
  for (let i = 1; i < points.length; i++) {
    const cpx = (points[i - 1].x + points[i].x) / 2;
    ctx.bezierCurveTo(cpx, points[i - 1].y, cpx, points[i].y, points[i].x, points[i].y);
  }
  ctx.lineTo(points[points.length - 1].x, padding.top + chartH);
  ctx.lineTo(points[0].x, padding.top + chartH);
  ctx.closePath();
  const grad = ctx.createLinearGradient(0, padding.top, 0, padding.top + chartH);
  grad.addColorStop(0, 'rgba(34,197,94,0.25)');
  grad.addColorStop(1, 'rgba(34,197,94,0.02)');
  ctx.fillStyle = grad;
  ctx.fill();

  // Line
  ctx.beginPath();
  ctx.strokeStyle = '#22c55e';
  ctx.lineWidth = 2.5;
  ctx.lineJoin = 'round';
  ctx.moveTo(points[0].x, points[0].y);
  for (let i = 1; i < points.length; i++) {
    const cpx = (points[i - 1].x + points[i].x) / 2;
    ctx.bezierCurveTo(cpx, points[i - 1].y, cpx, points[i].y, points[i].x, points[i].y);
  }
  ctx.stroke();

  // Labels
  labels.forEach((label, i) => {
    const x = padding.left + (i / (labels.length - 1)) * chartW;
    ctx.fillStyle = '#9ca3af';
    ctx.font = '9px Inter, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(label, x, H - padding.bottom + 14);
  });
}
