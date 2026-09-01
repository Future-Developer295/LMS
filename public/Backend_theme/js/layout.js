const EA_NAV_CONFIG = [
    {
        type: "link",
        key: "dashboard",
        label: "Dashboard",
        icon: "fa-solid fa-grip",
        href: "dashboard.html",
    },
    {
        type: "group",
        key: "teachers",
        label: "Teachers",
        icon: "fa-solid fa-chalkboard-user",
        children: [
            {
                key: "teachers-list",
                label: "List Teachers",
                icon: "fa-solid fa-list",
                href: "teachers.html",
            },
            {
                key: "teachers-add",
                label: "Add Teacher",
                icon: "fa-solid fa-plus",
                href: "teacher-add.html",
            },
            {
                key: "teachers-edit",
                label: "Edit Teacher",
                icon: "fa-solid fa-pen",
                href: "teacher-edit.html",
            },
        ],
    },
    {
        type: "group",
        key: "students",
        label: "Students",
        icon: "fa-solid fa-user-graduate",
        children: [
            {
                key: "students-list",
                label: "List Students",
                icon: "fa-solid fa-list",
                href: "students.html",
            },
            {
                key: "students-add",
                label: "Add Student",
                icon: "fa-solid fa-plus",
                href: "student-add.html",
            },
            {
                key: "students-edit",
                label: "Edit Student",
                icon: "fa-solid fa-pen",
                href: "student-edit.html",
            },
        ],
    },
    {
        type: "group",
        key: "classes",
        label: "Classes",
        icon: "fa-solid fa-book-bookmark",
        children: [
            {
                key: "classes-list",
                label: "List Classes",
                icon: "fa-solid fa-list",
                href: "classes.html",
            },
            {
                key: "classes-add",
                label: "Create Class",
                icon: "fa-solid fa-plus",
                href: "class-add.html",
            },
            {
                key: "classes-edit",
                label: "Edit Class",
                icon: "fa-solid fa-pen",
                href: "class-edit.html",
            },
        ],
    },
    {
        type: "group",
        key: "attendance",
        label: "Attendance",
        icon: "fa-solid fa-calendar-check",
        children: [
            {
                key: "attendance-list",
                label: "Attendance Records",
                icon: "fa-solid fa-list",
                href: "attendance.html",
            },
            {
                key: "attendance-add",
                label: "Mark Attendance",
                icon: "fa-solid fa-plus",
                href: "attendance-mark.html",
            },
            {
                key: "attendance-edit",
                label: "Edit Attendance",
                icon: "fa-solid fa-pen",
                href: "attendance-edit.html",
            },
        ],
    },
    {
        type: "group",
        key: "assignments",
        label: "Assignments",
        icon: "fa-solid fa-clipboard-list",
        children: [
            {
                key: "assignments-list",
                label: "List Assignments",
                icon: "fa-solid fa-list",
                href: "assignments.html",
            },
            {
                key: "assignments-add",
                label: "New Assignment",
                icon: "fa-solid fa-plus",
                href: "assignment-add.html",
            },
            {
                key: "assignments-edit",
                label: "Edit Assignment",
                icon: "fa-solid fa-pen",
                href: "assignment-edit.html",
            },
        ],
    },
    {
        type: "group",
        key: "submissions",
        label: "Submissions",
        icon: "fa-solid fa-square-check",
        children: [
            {
                key: "submissions-list",
                label: "All Submissions",
                icon: "fa-solid fa-list",
                href: "submissions.html",
            },
            {
                key: "submissions-grade",
                label: "Grade Submission",
                icon: "fa-solid fa-pen",
                href: "submission-grade.html",
            },
        ],
    },
];

function eaBuildSidebar() {
    const activeKey = document.body.dataset.page || "";

    const itemsHtml = EA_NAV_CONFIG.map(function (item) {
        if (item.type === "link") {
            const activeClass = item.key === activeKey ? " active" : "";
            return (
                '<a class="sidebar-nav-item' +
                activeClass +
                '" href="' +
                item.href +
                '">' +
                '<i class="' +
                item.icon +
                '"></i><span>' +
                item.label +
                "</span></a>"
            );
        }

        const isSectionActive = item.children.some(function (c) {
            return c.key === activeKey;
        });
        const childrenHtml = item.children
            .map(function (c) {
                const activeClass = c.key === activeKey ? " active" : "";
                return (
                    '<a class="sidebar-submenu-item' +
                    activeClass +
                    '" href="' +
                    c.href +
                    '">' +
                    '<i class="' +
                    c.icon +
                    '"></i><span>' +
                    c.label +
                    "</span></a>"
                );
            })
            .join("");

        return (
            "" +
            '<div class="sidebar-nav-group' +
            (isSectionActive ? " open" : "") +
            '" data-group="' +
            item.key +
            '">' +
            '  <button class="sidebar-nav-item group-toggle' +
            (isSectionActive ? " section-active" : "") +
            '" type="button">' +
            '    <i class="' +
            item.icon +
            '"></i><span>' +
            item.label +
            "</span>" +
            '    <i class="fa-solid fa-chevron-down chevron"></i>' +
            "  </button>" +
            '  <div class="sidebar-submenu">' +
            childrenHtml +
            "</div>" +
            "</div>"
        );
    }).join("");

    return (
        "" +
        '<div class="sidebar-brand">' +
        '  <div class="sidebar-brand-icon"><i class="fa-solid fa-graduation-cap"></i></div>' +
        '  <div class="sidebar-brand-text">' +
        '    <div class="name">EduAdmin</div>' +
        '    <div class="tagline">Management Portal</div>' +
        "  </div>" +
        '  <button class="sidebar-close-btn" id="sidebarCloseBtn" type="button"><i class="fa-solid fa-xmark"></i></button>' +
        "</div>" +
        '<nav class="sidebar-nav">' +
        itemsHtml +
        "</nav>" +
        '<div class="sidebar-footer">' +
        '  <a class="sidebar-nav-item" href="index.html" id="logoutNavLink"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></a>' +
        "</div>"
    );
}

function eaBuildTopbar() {
    const placeholder =
        document.body.dataset.searchPlaceholder || "Search across portal...";
    const userName = document.body.dataset.userName || "Admin User";
    const initials = userName
        .split(" ")
        .map(function (w) {
            return w[0];
        })
        .join("")
        .slice(0, 2)
        .toUpperCase();

    return (
        "" +
        '<button class="sidebar-toggle-btn" id="sidebarToggleBtn" type="button"><i class="fa-solid fa-bars"></i></button>' +
        '<div class="topbar-search"><i class="fa-solid fa-magnifying-glass"></i>' +
        '<input type="text" placeholder="' +
        placeholder +
        '" aria-label="Search"></div>' +
        '<div class="topbar-spacer"></div>' +
        '<div class="topbar-actions">' +
        '  <button class="icon-btn" type="button" aria-label="Notifications"><i class="fa-regular fa-bell"></i><span class="dot"></span></button>' +
        '  <div style="position:relative;">' +
        '    <button class="topbar-profile" id="profileMenuBtn" type="button">' +
        '      <div class="avatar-initials">' +
        initials +
        "</div>" +
        '      <span class="topbar-profile-name">' +
        userName +
        "</span>" +
        '      <i class="fa-solid fa-chevron-down" style="font-size:11px;color:var(--text-muted);"></i>' +
        "    </button>" +
        '    <div class="profile-dropdown" id="profileDropdown">' +
        '      <a href="#"><i class="fa-regular fa-user"></i> My Profile</a>' +
        '      <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>' +
        "      <hr>" +
        '      <a href="index.html" class="danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>' +
        "    </div>" +
        "  </div>" +
        "</div>"
    );
}

function eaInitLayout() {
    const sidebarRoot = document.getElementById("sidebar-root");
    const topbarRoot = document.getElementById("topbar-root");
    if (sidebarRoot) sidebarRoot.innerHTML = eaBuildSidebar();
    if (topbarRoot) topbarRoot.innerHTML = eaBuildTopbar();

    document
        .querySelectorAll(".sidebar-nav-group .group-toggle")
        .forEach(function (btn) {
            btn.addEventListener("click", function () {
                const group = btn.closest(".sidebar-nav-group");
                const willOpen = !group.classList.contains("open");
                document
                    .querySelectorAll(".sidebar-nav-group.open")
                    .forEach(function (g) {
                        if (g !== group) g.classList.remove("open");
                    });
                group.classList.toggle("open", willOpen);
            });
        });

    const sidebar = document.querySelector(".sidebar");
    const toggleBtn = document.getElementById("sidebarToggleBtn");
    const closeBtn = document.getElementById("sidebarCloseBtn");
    const backdrop = document.getElementById("sidebarBackdrop");

    function openSidebar() {
        sidebar.classList.add("open");
        if (backdrop) backdrop.classList.add("open");
    }

    function closeSidebar() {
        sidebar.classList.remove("open");
        if (backdrop) backdrop.classList.remove("open");
    }

    if (toggleBtn) toggleBtn.addEventListener("click", openSidebar);
    if (closeBtn) closeBtn.addEventListener("click", closeSidebar);
    if (backdrop) backdrop.addEventListener("click", closeSidebar);

    const profileBtn = document.getElementById("profileMenuBtn");
    const profileDropdown = document.getElementById("profileDropdown");
    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            profileDropdown.classList.toggle("open");
        });
        document.addEventListener("click", function () {
            profileDropdown.classList.remove("open");
        });
    }
}

document.addEventListener("DOMContentLoaded", eaInitLayout);
