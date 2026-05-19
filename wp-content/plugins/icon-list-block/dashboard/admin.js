import React from 'react-dom';
import '../../bpl-tools/Admin/style.scss';
import App from './App';
import { dashboardInfo } from './utils/data';

document.addEventListener('DOMContentLoaded', () => {
  const adminEl = document.getElementById("ilbDashboard");
  const info = JSON.parse(adminEl.dataset.info);

  React.createRoot(adminEl).render(<App {...dashboardInfo(info)} />)

  adminEl.removeAttribute('data-info');
});