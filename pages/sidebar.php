<?php

  $role_id = $_SESSION['role_id'] ?? null;
  $permissions = $_SESSION['permissions'] ?? [];

  function hasPermission($permissions, $permission) {
      return in_array($permission, $permissions);
  }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <?php if (hasPermission($permissions, 'manage_user')): ?>
        <li class="nav-item">
            <a class="nav-link" href="manage_user.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Manage User</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (hasPermission($permissions, 'manage_librarian')): ?>
        <li class="nav-item">
            <a class="nav-link" href="manage_librarian.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Manage Librarian</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (hasPermission($permissions, 'manage_book')): ?>
        <li class="nav-item">
            <a class="nav-link" href="manage_book.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Manage Book</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (hasPermission($permissions, 'issue_book')): ?>
        <li class="nav-item">
            <a class="nav-link" href="manage_issue.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Manage Issue Book</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (hasPermission($permissions, 'borrow_book')): ?>
        <li class="nav-item">
            <a class="nav-link" href="view_book.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Borrow Book</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (hasPermission($permissions, 'view_borrow')): ?>
        <li class="nav-item">
            <a class="nav-link" href="view_borrow.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">View Borrow</span>
            </a>
        </li>
        <?php endif; ?>
  </ul>
</nav>