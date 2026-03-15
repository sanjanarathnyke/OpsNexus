   <header class="header">
       <div class="search-bar">
           <span class="search-icon">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                   <circle cx="11" cy="11" r="8" />
                   <line x1="21" y1="21" x2="16.65" y2="16.65" />
               </svg>
           </span>
           <input type="text" placeholder="Search projects, developers..." />
       </div>
       <div class="header-right">
           <button class="header-icon-btn" id="notif-bell" title="Notifications">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                   <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                   <path d="M13.73 21a2 2 0 0 1-3.46 0" />
               </svg>
               <span class="notif-dot"></span>
           </button>
           <button class="header-icon-btn" title="Help">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                   <circle cx="12" cy="12" r="10" />
                   <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                   <line x1="12" y1="17" x2="12.01" y2="17" />
               </svg>
           </button>
           <div style="position:relative">
               <button class="profile-btn">
                   <div class="avatar">JD</div>
                   <div class="profile-info">
                       <div class="profile-name">John Doe</div>
                       <div class="profile-role">Admin</div>
                   </div>
                   <span class="dropdown-arrow">
                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round">
                           <polyline points="6 9 12 15 18 9" />
                       </svg>
                   </span>
               </button>
               <div class="profile-dropdown">
                   <div class="dropdown-item" onclick="window.location.href='{{ route('settings') }}'">
                       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" style="margin-right: 4px;">
                           <circle cx="12" cy="12" r="3" />
                           <path
                               d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                       </svg>
                       Settings
                   </div>
                   <div class="dropdown-item">
                       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" style="margin-right: 4px;">
                           <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                           <circle cx="12" cy="7" r="4" />
                       </svg>
                       Profile
                   </div>
                   <div class="dropdown-item">
                       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" style="margin-right: 4px;">
                           <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                           <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                       </svg>
                       Documentation
                   </div>
                   <div class="dropdown-divider"></div>
                   <div class="dropdown-item" style="color:#ef4444">
                       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" style="margin-right: 4px;">
                           <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                           <polyline points="16 17 21 12 16 7" />
                           <line x1="21" y1="12" x2="9" y2="12" />
                       </svg>
                       Sign Out
                   </div>
               </div>
           </div>
       </div>
   </header>
