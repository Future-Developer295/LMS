<?php

if (!isset($pageTitle)) {
  $pageTitle = 'Classroom';
}
if (!isset($activeNav)) {
  $activeNav = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('Frontend_theme/css/style.css') }}">
</head>
<style>


  .profile-dropdown {
    position: relative;
    display: inline-flex;
  }



  .profile-dropdown {
    position: relative;
  }


  /* Profile Avatar Button */
  .profile-avatar {
    width: 42px;
    height: 42px;

    padding: 0;
    border: none;
    border-radius: 50%;

    background: transparent;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: all 0.2s ease;
  }


  .profile-avatar:hover {
    background: #f8f9fa;
  }


  /* Avatar Circle */
  .avatar-circle {
    width: 40px;
    height: 40px;

    border-radius: 50%;

    background: #f4b400;
    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
    font-weight: 700;

    text-transform: uppercase;

    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  }


  /* Profile Image */
  .profile-avatar-image {
    width: 40px;
    height: 40px;

    border-radius: 50%;

    object-fit: cover;

    border: 2px solid #f4b400;
  }


 

  .profile-menu {
    position: absolute;

    top: calc(100% + 10px);
    right: 0;

    width: 330px;

    background: #ffffff;

    border-radius: 16px;

    border: 1px solid #e5e7eb;

    box-shadow:
      0 10px 30px rgba(0, 0, 0, 0.12),
      0 3px 8px rgba(0, 0, 0, 0.06);

    overflow: hidden;

    z-index: 9999;

    display: none;

    animation: profileDropdown 0.18s ease;
  }


  /* Dropdown Open */
  .profile-menu.show {
    display: block;
  }


  /* Animation */
  @keyframes profileDropdown {

    from {
      opacity: 0;
      transform: translateY(-6px) scale(0.98);
    }

    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }

  }


 

  .profile-header {
    display: flex;
    align-items: center;

    gap: 14px;

    padding: 20px 18px;

    background: linear-gradient(135deg,
        #fffaf0,
        #ffffff);
  }


  /* Big Avatar */
  .profile-big-avatar {
    width: 58px;
    height: 58px;

    flex-shrink: 0;

    border-radius: 50%;

    background: #f4b400;

    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 23px;
    font-weight: 700;

    text-transform: uppercase;

    box-shadow: 0 3px 8px rgba(244, 180, 0, 0.25);

    overflow: hidden;
  }


  /* Big Profile Image */
  .profile-big-avatar-image {
    width: 100%;
    height: 100%;

    object-fit: cover;
  }


  /* User Information */
  .profile-user-info {
    min-width: 0;

    flex: 1;
  }


  /* Name */
  .profile-user-name {
    color: #202124;

    font-size: 16px;
    font-weight: 700;

    line-height: 1.3;

    margin-bottom: 4px;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }


  /* Email */
  .profile-user-email {
    color: #6b7280;

    font-size: 13px;

    line-height: 1.3;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }




  .profile-divider {
    height: 1px;

    background: #eeeeee;

    margin: 0;
  }




  .profile-item {
    width: 100%;

    min-height: 68px;

    padding: 12px 16px;

    display: flex;
    align-items: center;

    gap: 12px;

    background: #ffffff;

    border: none;

    text-decoration: none;

    color: #202124;

    cursor: pointer;

    transition: all 0.18s ease;

    box-sizing: border-box;
  }


  /* Hover */
  .profile-item:hover {
    background: #fff9e8;

    text-decoration: none;

    color: #202124;
  }


  /* Icon Box */
  .profile-item-icon {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    border-radius: 10px;

    background: #fff4cc;

    display: flex;
    align-items: center;
    justify-content: center;
  }


  /* SVG */
  .profile-item-icon svg {
    width: 20px;
    height: 20px;

    fill: #d99d00;
  }


  /* Text Container */
  .profile-item>span:nth-child(2) {
    flex: 1;

    display: flex;
    flex-direction: column;

    gap: 3px;
  }


  /* Strong */
  .profile-item strong {
    color: #202124;

    font-size: 14px;
    font-weight: 600;
  }


  /* Small */
  .profile-item small {
    color: #80868b;

    font-size: 12px;

    font-weight: 400;
  }


  /* Arrow */
  .profile-arrow {
    font-size: 25px;

    line-height: 1;

    color: #9aa0a6;

    transition: transform 0.18s ease;
  }


  /* Arrow Hover */
  .profile-item:hover .profile-arrow {
    color: #d99d00;

    transform: translateX(3px);
  }


  

  .logout-item {
    border-top: 1px solid #eeeeee;

    font-family: inherit;

    text-align: left;
  }


  /* Logout Icon */
  .logout-item .profile-item-icon {
    background: #fff0f0;
  }


  .logout-item .profile-item-icon svg {
    fill: #d93025;
  }


  /* Logout Hover */
  .logout-item:hover {
    background: #fff5f5;
  }


  .logout-item:hover strong {
    color: #d93025;
  }


 

  @media (max-width: 500px) {

    .profile-menu {
      width: calc(100vw - 24px);

      right: -6px;

      border-radius: 14px;
    }

    .profile-header {
      padding: 16px;
    }

    .profile-big-avatar {
      width: 52px;
      height: 52px;

      font-size: 21px;
    }

    .profile-item {
      min-height: 62px;
    }

  }



  /* Avatar */

  .profile-avatar {
    width: 42px;
    height: 42px;

    border-radius: 50%;
    border: 3px solid #ffffff;

    background: #5b5fc7;
    color: #ffffff;

    font-size: 15px;
    font-weight: 700;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    box-shadow: 0 2px 8px rgba(0, 0, 0, .12);

    transition: .2s ease;
  }

  .profile-avatar:hover {
    transform: scale(1.04);
    box-shadow: 0 4px 14px rgba(0, 0, 0, .18);
  }


  /* Dropdown */

  .profile-menu {
    position: absolute;

    top: 52px;
    right: 0;

    width: 310px;

    background: #ffffff;

    border: 1px solid #e8e8ec;

    border-radius: 18px;

    padding: 8px;

    box-shadow:
      0 10px 30px rgba(0, 0, 0, .12),
      0 2px 8px rgba(0, 0, 0, .06);

    z-index: 99999;

    opacity: 0;
    visibility: hidden;

    transform: translateY(-8px);

    transition:
      opacity .18s ease,
      transform .18s ease,
      visibility .18s ease;
  }

  .profile-avatar {
    overflow: hidden;
    padding: 0;
  }

  .profile-avatar-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
  }

  .profile-big-avatar {
    overflow: hidden;
  }

  .profile-big-avatar-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
  }

  .profile-menu.show {
    opacity: 1;
    visibility: visible;

    transform: translateY(0);
  }


  /* Header */

  .profile-header {
    display: flex;
    align-items: center;

    gap: 13px;

    padding: 15px 13px;
  }


  /* Big Avatar */

  .profile-big-avatar {
    width: 48px;
    height: 48px;

    flex-shrink: 0;

    border-radius: 50%;

    background: #5b5fc7;
    color: #fff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;
    font-weight: 700;
  }


  /* User Info */

  .profile-user-info {
    min-width: 0;
  }

  .profile-user-name {
    font-size: 15px;
    font-weight: 650;

    color: #202124;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }



  .auth-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-left: auto;
  }


  /* Common Button */
  .auth-btn {
    height: 42px;
    min-width: 105px;
    padding: 0 18px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    border-radius: 10px;

    font-size: 14px;
    font-weight: 600;
    text-decoration: none;

    transition: all 0.2s ease;

    cursor: pointer;
  }


  /* Sign Up Button */
  .signup-btn {
    background: #ffffff;
    color: #5f6368;

    border: 1px solid #dadce0;

    box-shadow: 0 1px 2px rgba(60, 64, 67, 0.12);
  }


  .signup-btn i {
    font-size: 14px;
  }


  /* Sign Up Hover */
  .signup-btn:hover {
    background: #f8f9fa;
    color: #202124;

    border-color: #c7c9cc;

    transform: translateY(-1px);

    box-shadow: 0 3px 7px rgba(60, 64, 67, 0.15);
  }


  /* Login Button */
  .login-btn {
    background: #f4b400;
    color: #ffffff;

    border: 1px solid #f4b400;

    box-shadow: 0 2px 5px rgba(244, 180, 0, 0.25);
  }


  .login-btn i {
    font-size: 14px;
  }


  /* Login Hover */
  .login-btn:hover {
    background: #e5a900;
    color: #ffffff;

    border-color: #e5a900;

    transform: translateY(-1px);

    box-shadow: 0 4px 10px rgba(244, 180, 0, 0.30);
  }


  /* Click Effect */
  .auth-btn:active {
    transform: translateY(0);
  }


  

  @media (max-width: 600px) {

    .auth-buttons {
      gap: 6px;
    }

    .auth-btn {
      min-width: auto;
      height: 38px;
      padding: 0 12px;

      border-radius: 8px;

      font-size: 13px;
    }

    .auth-btn i {
      font-size: 13px;
    }

  }


  /* Very Small Screens */
  @media (max-width: 400px) {

    .auth-btn span {
      display: none;
    }

    .auth-btn {
      width: 40px;
      min-width: 40px;
      padding: 0;
    }

    .auth-btn i {
      font-size: 15px;
    }

  }


  .profile-user-email {
    margin-top: 4px;

    font-size: 12.5px;

    color: #777b85;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }


  /* Divider */

  .profile-divider {
    height: 1px;

    background: #eeeeF2;

    margin: 3px 7px 7px;
  }


  

  .profile-dropdown {
    position: relative;
    z-index: 9999;
  }


  /* Profile Button */
  .profile-avatar {
    width: 44px;
    height: 44px;

    padding: 2px;
    border: 2px solid transparent;
    border-radius: 50%;

    background: #fff;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: .25s ease;
  }


  .profile-avatar:hover {
    border-color: #f4b400;
    transform: scale(1.04);
  }


  /* Small Avatar */
  .avatar-circle {
    width: 40px;
    height: 40px;

    border-radius: 50%;

    background: linear-gradient(135deg, #f4b400, #e5a000);

    color: #fff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
    font-weight: 700;

    box-shadow: 0 4px 10px rgba(244, 180, 0, .30);
  }


  /* Profile Image */
  .profile-avatar-image {
    width: 40px;
    height: 40px;

    border-radius: 50%;

    object-fit: cover;

    border: 2px solid #f4b400;
  }


  

  .profile-menu {
    position: absolute;

    top: calc(100% + 12px);
    right: 0;

    width: 350px;

    background: #fff;

    border: 1px solid #e8eaed;

    border-radius: 18px;

    overflow: hidden;

    box-shadow:
      0 20px 50px rgba(0, 0, 0, .14),
      0 5px 15px rgba(0, 0, 0, .08);

    display: none;

    transform-origin: top right;

    animation: profileMenuShow .2s ease;

    z-index: 99999;
  }


  .profile-menu.show {
    display: block;
  }


  @keyframes profileMenuShow {

    from {
      opacity: 0;
      transform: translateY(-8px) scale(.97);
    }

    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }

  }


 

  .profile-header {

    position: relative;

    display: flex;
    align-items: center;

    gap: 15px;

    padding: 22px 20px;

    background:
      linear-gradient(135deg,
        #fff8df 0%,
        #fffdf7 55%,
        #ffffff 100%);

    border-bottom: 1px solid #f1f1f1;
  }


  /* Decorative Yellow Line */
  .profile-header::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background: linear-gradient(90deg,
        #f4b400,
        #f7c948,
        #f4b400);
  }


  /* Big Avatar */
  .profile-big-avatar {

    width: 64px;
    height: 64px;

    min-width: 64px;

    border-radius: 50%;

    background: linear-gradient(135deg,
        #f4b400,
        #d99d00);

    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 25px;
    font-weight: 700;

    box-shadow:
      0 5px 15px rgba(244, 180, 0, .30);

    overflow: hidden;

    border: 3px solid #fff;
  }


  /* Big Image */
  .profile-big-avatar-image {

    width: 100%;
    height: 100%;

    object-fit: cover;
  }


  /* User Info */
  .profile-user-info {

    min-width: 0;
    flex: 1;
  }


  /* Name */
  .profile-user-name {

    color: #202124;

    font-size: 17px;
    font-weight: 700;

    line-height: 1.3;

    margin-bottom: 5px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
  }


  /* Email */
  .profile-user-email {

    color: #6b7280;

    font-size: 13px;

    line-height: 1.4;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
  }


 

  .profile-divider {

    height: 1px;

    background: #eeeeee;
  }


  

  .profile-item {

    width: 100%;

    min-height: 72px;

    padding: 12px 18px;

    box-sizing: border-box;

    display: flex;
    align-items: center;

    gap: 13px;

    border: none;

    background: #fff;

    color: #202124;

    text-decoration: none;

    cursor: pointer;

    transition: .2s ease;
  }


  .profile-item:hover {

    background: #fffaf0;

    color: #202124;

    padding-left: 21px;

  }


 

  .profile-item-icon {

    width: 42px;
    height: 42px;

    min-width: 42px;

    border-radius: 12px;

    background: #fff5d6;

    display: flex;
    align-items: center;
    justify-content: center;

    transition: .2s ease;
  }


  .profile-item:hover .profile-item-icon {

    background: #f4b400;

    transform: scale(1.05);
  }


  .profile-item-icon svg {

    width: 21px;
    height: 21px;

    fill: #d99d00;

    transition: .2s ease;
  }


  .profile-item:hover .profile-item-icon svg {

    fill: #fff;
  }


  

  .profile-item>span:nth-child(2) {

    flex: 1;

    display: flex;

    flex-direction: column;

    gap: 3px;
  }


  .profile-item strong {

    font-size: 14px;

    font-weight: 650;

    color: #202124;
  }


  .profile-item small {

    font-size: 12px;

    color: #80868b;
  }


  

  .profile-arrow {

    font-size: 25px;

    color: #b0b3b8;

    transition: .2s ease;
  }


  .profile-item:hover .profile-arrow {

    color: #d99d00;

    transform: translateX(4px);
  }


  

  .logout-item {

    border-top: 1px solid #eeeeee;

    font-family: inherit;

    text-align: left;
  }


  .logout-item .profile-item-icon {

    background: #fff0f0;
  }


  .logout-item .profile-item-icon svg {

    fill: #d93025;
  }


  .logout-item:hover {

    background: #fff6f6;
  }

  /* Add Class Menu */
  .add-class-wrap {
    position: relative;
  }

  .add-class-menu {
    position: absolute;
    top: 52px;
    right: 0;
    width: 180px;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
    padding: 6px;
    display: none;
    z-index: 9999;
  }

  .add-class-menu.show {
    display: block;
  }

  .add-class-item {
    width: 100%;
    display: block;
    padding: 11px 14px;
    border: none;
    background: transparent;
    border-radius: 7px;
    color: #202124;
    font-size: 14px;
    text-align: left;
    cursor: pointer;
  }

  .add-class-item:hover {
    background: #fff8df;
    color: #d99d00;
  }

  /* Popup Overlay */
  .join-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .45);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    padding: 20px;
  }

  .join-modal-overlay.show {
    display: flex;
  }

  /* Popup */
  .join-modal {
    position: relative;
    width: 100%;
    max-width: 430px;
    background: #fff;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, .22);
    animation: joinPopup .2s ease;
  }

  @keyframes joinPopup {
    from {
      opacity: 0;
      transform: translateY(-15px) scale(.97);
    }

    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  /* Close */
  .join-modal-close {
    position: absolute;
    top: 12px;
    right: 14px;
    width: 34px;
    height: 34px;
    border: none;
    background: #f5f5f5;
    border-radius: 50%;
    font-size: 24px;
    line-height: 1;
    color: #666;
    cursor: pointer;
  }

  .join-modal-close:hover {
    background: #fff1c7;
    color: #d99d00;
  }

  /* Icon */
  .join-modal-icon {
    width: 58px;
    height: 58px;
    margin-bottom: 15px;
    border-radius: 15px;
    background: #fff4cc;
    color: #f4b400;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
  }

  /* Heading */
  .join-modal h2 {
    margin: 0 0 8px;
    color: #202124;
    font-size: 23px;
    font-weight: 700;
  }

  .join-modal p {
    margin: 0 0 24px;
    color: #6b7280;
    font-size: 14px;
    line-height: 1.5;
  }

  /* Input */
  .join-input-wrap {
    margin-bottom: 18px;
  }

  .join-input-wrap label {
    display: block;
    margin-bottom: 8px;
    color: #202124;
    font-size: 13px;
    font-weight: 600;
  }

  .join-input-wrap input {
    width: 100%;
    height: 48px;
    box-sizing: border-box;
    padding: 0 14px;
    border: 1px solid #dadce0;
    border-radius: 9px;
    outline: none;
    font-size: 14px;
    color: #202124;
    transition: .2s ease;
  }

  .join-input-wrap input:focus {
    border-color: #f4b400;
    box-shadow: 0 0 0 3px rgba(244, 180, 0, .12);
  }

  /* Join Button */
  .join-submit-btn {
    width: 100%;
    height: 48px;
    border: none;
    border-radius: 9px;
    background: #f4b400;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s ease;
  }

  .join-submit-btn:hover {
    background: #e5a900;
    transform: translateY(-1px);
    box-shadow: 0 5px 12px rgba(244, 180, 0, .25);
  }

  .join-submit-btn i {
    margin-right: 7px;
  }

  /* Mobile */
  @media (max-width: 500px) {
    .join-modal {
      padding: 25px 20px;
      border-radius: 15px;
    }
  }

  .logout-item:hover .profile-item-icon {

    background: #d93025;
  }


  .logout-item:hover .profile-item-icon svg {

    fill: #fff;
  }


  .logout-item:hover strong {

    color: #d93025;
  }


  

  @media (max-width: 500px) {

    .profile-menu {

      width: calc(100vw - 24px);

      right: -5px;

      border-radius: 15px;
    }


    .profile-header {

      padding: 20px 16px;
    }


    .profile-big-avatar {

      width: 56px;
      height: 56px;

      min-width: 56px;

      font-size: 22px;
    }


    .profile-item {

      padding: 11px 14px;
    }

  }


  .profile-item {
    width: 100%;
    min-height: 58px;

    padding: 8px 11px;

    border: 0;
    border-radius: 12px;

    background: transparent;

    display: flex;
    align-items: center;

    gap: 12px;

    text-decoration: none;

    text-align: left;

    cursor: pointer;

    color: #25262b;

    transition: background .18s ease;
  }


  /* Hover */

  .profile-item:hover {
    background: #f5f6fb;
  }


  /* Icon */

  .profile-item-icon {
    width: 36px;
    height: 36px;

    flex-shrink: 0;

    border-radius: 10px;

    background: #f0f1f8;

    display: flex;
    align-items: center;
    justify-content: center;
  }

  .profile-item-icon svg {
    width: 19px;
    height: 19px;

    fill: #555b72;
  }


  /* Text */

  .profile-item strong {
    display: block;

    font-size: 13.5px;
    font-weight: 600;

    color: #292a2f;
  }

  .profile-item small {
    display: block;

    margin-top: 3px;

    font-size: 11.5px;

    color: #8a8d96;
  }






/* Header */

.join-class-head {
    flex-shrink: 0;
    padding: 22px 26px;
    font-size: 22px;
    font-weight: 600;
    color: #202124;
    border-bottom: 1px solid #eeeeee;
}





/* Account */

.join-class-account-box {
    background: #f8f9fa;
    border: 1px solid #e1e3e6;
    border-radius: 12px;
    padding: 17px;
    margin-bottom: 24px;
}

.join-class-signedin-label {
    font-size: 13px;
    color: #5f6368;
    margin-bottom: 12px;
}

.join-class-account-row {
    display: flex;
    align-items: center;
    gap: 13px;
}

.join-class-avatar {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 50%;
    background: #fbbc04;
    color: #ffffff;
    font-size: 18px;
    font-weight: 600;
}

.join-class-name {
    font-size: 15px;
    font-weight: 600;
    color: #202124;
}

.join-class-email {
    font-size: 13px;
    color: #5f6368;
    margin-top: 2px;
}


/* Switch */

.join-class-switch-btn {
    margin-top: 14px;
    padding: 7px 13px;
    background: #ffffff;
    border: 1px solid #dadce0;
    border-radius: 7px;
    color: #1a73e8;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
}


/* Class code */

.join-class-code-box {
    margin-bottom: 8px;
}

.join-class-code-label {
    font-size: 16px;
    font-weight: 600;
    color: #202124;
    margin-bottom: 5px;
}

.join-class-code-sub {
    font-size: 13px;
    color: #5f6368;
    margin-bottom: 14px;
    line-height: 1.5;
}

.join-class-code-input {
    width: 100%;
    height: 48px;
    padding: 0 14px;
    border: 1px solid #dadce0;
    border-radius: 8px;
    outline: none;
    font-size: 15px;
    box-sizing: border-box;
}

.join-class-code-input:focus {
    border-color: #1a73e8;
    box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.12);
}



.join-class-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);

    display: none;
    align-items: flex-start;
    justify-content: center;

    box-sizing: border-box;

    overflow-y: auto;
    z-index: 9999;
}

.join-class-overlay.open {
    display: flex;
}


/* POPUP */

.join-class-modal {
    width: 100%;
    max-width: 520px;

    /* popup ko screen ke andar rakhega */
    max-height: calc(100vh - 50px);

margin-top: 20px !important;
    background: #fff;
    border-radius: 16px;

    display: flex;
    flex-direction: column;

    overflow: hidden;

    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.22);
}


/* BODY SCROLL */

.join-class-body {
    padding: 22px 26px 10px;

    overflow-y: auto;
    flex: 1;
    min-height: 0;
}


/* FOOTER HAMESHA VISIBLE */

.join-class-footer {
    flex-shrink: 0;

    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;

    padding: 16px 26px 20px;

    background: #fff;
    border-top: 1px solid #eeeeee;
}




/* Cancel */

.join-class-cancel-btn {
    height: 40px;
    padding: 0 17px;
    border: 1px solid #dadce0;
    background: #ffffff;
    border-radius: 7px;
    color: #5f6368;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
}


/* Join */

.join-class-join-btn {
    height: 40px;
    min-width: 80px;
    padding: 0 20px;

    border: none;
    border-radius: 7px;

    background: #1a73e8;
    color: #ffffff;

    font-size: 14px;
    font-weight: 600;

    cursor: pointer;
}

.join-class-join-btn:hover {
    background: #1769d2;
}


/* Mobile */

@media (max-width: 576px) {

    .join-class-overlay {
        padding: 12px;
    }

    .join-class-modal {
        max-height: 94vh;
        border-radius: 14px;
    }

    .join-class-head {
        padding: 18px 20px;
    }

    .join-class-body {
        padding: 18px 20px 10px;
    }

    .join-class-footer {
        padding: 15px 20px 18px;
    }
}




  /* Arrow */

  .profile-arrow {
    margin-left: auto;

    font-size: 22px;

    color: #a2a4ab;
  }


  /* Logout */

  .logout-item {
    font-family: inherit;
  }

  .logout-item:hover {
    background: #fff4f4;
  }

  .logout-item:hover .profile-item-icon {
    background: #ffe8e8;
  }

  .logout-item:hover .profile-item-icon svg {
    fill: #d93025;
  }

  .logout-item:hover strong {
    color: #d93025;
  }


  /* Mobile */

  @media (max-width: 600px) {

    .profile-menu {
      width: 285px;
      right: -5px;
    }

  }
</style>

<body>


  <header class="gc-header d-flex align-items-center px-3 gap-2">

    <!-- Menu Button -->
    <button class="btn-icon" id="menuToggle">
      <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Classroom Logo + Brand -->
    <span class="d-flex align-items-center gap-2">

      <svg width="30" height="30" viewBox="0 0 108 108" xmlns="http://www.w3.org/2000/svg">

        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M96.75 11.25h-85.5c-3.73 0-6.75 3.02-6.75 6.75v72c0 3.729 3.02 6.75 6.75 6.75h85.5c3.729 0 6.75-3.021 6.75-6.75V18c0-3.73-3.021-6.75-6.75-6.75z"
          fill="#F4B400" />

        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M13.5 20.25h81v67.5h-81v-67.5z"
          fill="#0F9D58" />

        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M36 56.25a5.063 5.063 0 100-10.126 5.063 5.063 0 000 10.126zm41.063-5.063a5.063 5.063 0 11-10.126 0 5.063 5.063 0 0110.126 0zM60.75 66.055c0-3.555 5.828-6.429 11.25-6.429s11.25 2.874 11.25 6.43v3.695h-22.5v-3.696zm-36 0c0-3.555 5.828-6.429 11.25-6.429 5.423 0 11.25 2.874 11.25 6.43v3.695h-22.5v-3.696z"
          fill="#57BB8A" />

        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M60.75 45.001c0 3.73-3.02 6.75-6.744 6.75a6.753 6.753 0 01-6.756-6.75 6.756 6.756 0 016.756-6.75c3.723 0 6.744 3.026 6.744 6.75zm-22.5 20.25c0-4.973 8.156-9 15.75-9 7.594 0 15.75 4.027 15.75 9v4.5h-31.5v-4.5z"
          fill="#F7F7F7" />

        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M63 83.251h20.25v4.5H63v-4.5z"
          fill="#F1F1F1" />

      </svg>

      <span class="brand-text">Classroom</span>

    </span>


    <!-- Push everything to right -->
    <div class="flex-grow-1"></div>


    @auth



    <div class="add-class-wrap"> <button class="btn-icon" id="addClassBtn" type="button"> <i class="fa-solid fa-plus"></i> </button>
      <div class="add-class-menu" id="addClassMenu"> <button type="button" class="add-class-item" id="joinClassLink"> Join class </button> </div>
    </div> <!-- Join Class Popup -->




    <!-- Profile Dropdown -->
    <div class="profile-dropdown">

      @php
      $user = auth()->user();

      $displayName = $user?->full_name
      ?? $user?->name
      ?? $user?->email_address
      ?? $user?->email
      ?? 'User';

      $firstLetter = strtoupper(substr(trim($displayName), 0, 1));

      $email = $user?->email_address
      ?? $user?->email
      ?? '';
      @endphp


      <!-- Profile Button -->
      <button type="button"
        class="profile-avatar"
        id="profileToggle"
        aria-label="Profile menu">

        @if($user?->profile_image)

        <img
          src="{{ asset('storage/' . $user->profile_image) }}"
          alt="{{ $displayName }}"
          class="profile-avatar-image">

        @else

        <div class="avatar-circle">
          {{ $firstLetter }}
        </div>

        @endif

      </button>


      <!-- Profile Menu -->
      <div class="profile-menu" id="profileMenu">

        <!-- User Header -->
        <div class="profile-header">

          <!-- Big Avatar -->
          <div class="profile-big-avatar">

            @if($user?->profile_image)

            <img
              src="{{ asset('storage/' . $user->profile_image) }}"
              alt="{{ $displayName }}"
              class="profile-big-avatar-image">

            @else

            <span>
              {{ $firstLetter }}
            </span>

            @endif

          </div>


          <!-- User Information -->
          <div class="profile-user-info">

            <div class="profile-user-name">
              {{ $displayName }}
            </div>

            <div class="profile-user-email">
              {{ $email }}
            </div>

          </div>

        </div>


        <!-- Divider -->
        <div class="profile-divider"></div>


        <!-- My Profile -->
        <a href="{{ route('student.profile') }}"
          class="profile-item">

          <span class="profile-item-icon">

            <svg viewBox="0 0 24 24">

              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4
                    1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8
                    4v2h16v-2c0-2.66-5.33-4-8-4z" />

            </svg>

          </span>


          <span>

            <strong>My Profile</strong>

            <small>View your profile</small>

          </span>


          <span class="profile-arrow">
            ›
          </span>

        </a>


        <!-- Logout -->
        <form method="POST"
          action="{{ route('student.logout') }}">

          @csrf

          <button type="submit"
            class="profile-item logout-item">

            <span class="profile-item-icon">

              <svg viewBox="0 0 24 24">

                <path d="M10 17l5-5-5-5v3H3v4h7v3zm9-14h-8c-1.1
                        0-2 .9-2 2v3h2V5h8v14h-8v-3H9v3c0 1.1.9
                        2 2 2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />

              </svg>

            </span>


            <span>

              <strong>Logout</strong>

              <small>Sign out of your account</small>

            </span>

          </button>

        </form>

      </div>

    </div>




    @else





    <!-- NOT LOGGED IN -->

    <div class="auth-buttons">

      <!-- Sign Up -->
      <a href="{{ route('student.register') }}" class="auth-btn signup-btn">
        <i class="fa-solid fa-user-plus"></i>
        <span>Sign Up</span>
      </a>

      <!-- Login -->
      <a href="{{ route('student.login') }}" class="auth-btn login-btn">
        <i class="fa-solid fa-right-to-bracket"></i>
        <span>Login</span>
      </a>

    </div>





    @endauth

  </header>



  <div class="gc-backdrop" id="backdrop"></div>

  <div class="d-flex app-body">
    <nav class="gc-sidebar collapsed" id="sidebar">
      <a href="{{ route('index') }}" @yield('index') class="gc-nav-link ">
        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
          <path d="M12 3L4 9v12h16V9l-8-6zm6 16h-3v-6H9v6H6v-9l6-4.5 6 4.5v9z"></path>
        </svg><span class="nav-label">Home</span>
      </a>
      <a href="{{ route('calendar') }}" class="gc-nav-link @yield('calender')">
        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
          <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"></path>
        </svg> <span class="nav-label">Calendar</span>
      </a>
      <a href="{{ route('classwork') }}" class="gc-nav-link @yield('classwork')">
        <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" fill='#444746'>
          <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"></path>
        </svg> <span class="nav-label">Enrolled</span>
        <i class="fa-solid fa-chevron-down chev"></i>
      </a>
      <a href="{{ route('archived') }}" class="gc-nav-link @yield('archived')">
        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
          <path d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM6.24 5h11.52l.83 1H5.42l.82-1zM5 19V8h14v11H5zm11-5.5l-4 4-4-4 1.41-1.41L11 13.67V10h2v3.67l1.59-1.59L16 13.5z"></path>
        </svg><span class="nav-label">Archived classes</span>
      </a>
      <a href="#" class="gc-nav-link <?php echo $activeNav === 'settings' ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" fill='#444746'>
          <path d="M13.85 22.25h-3.7c-.74 0-1.36-.54-1.45-1.27l-.27-1.89c-.27-.14-.53-.29-.79-.46l-1.8.72c-.7.26-1.47-.03-1.81-.65L2.2 15.53c-.35-.66-.2-1.44.36-1.88l1.53-1.19c-.01-.15-.02-.3-.02-.46 0-.15.01-.31.02-.46l-1.52-1.19c-.59-.45-.74-1.26-.37-1.88l1.85-3.19c.34-.62 1.11-.9 1.79-.63l1.81.73c.26-.17.52-.32.78-.46l.27-1.91c.09-.7.71-1.25 1.44-1.25h3.7c.74 0 1.36.54 1.45 1.27l.27 1.89c.27.14.53.29.79.46l1.8-.72c.71-.26 1.48.03 1.82.65l1.84 3.18c.36.66.2 1.44-.36 1.88l-1.52 1.19c.01.15.02.3.02.46s-.01.31-.02.46l1.52 1.19c.56.45.72 1.23.37 1.86l-1.86 3.22c-.34.62-1.11.9-1.8.63l-1.8-.72c-.26.17-.52.32-.78.46l-.27 1.91c-.1.68-.72 1.22-1.46 1.22zm-3.23-2h2.76l.37-2.55.53-.22c.44-.18.88-.44 1.34-.78l.45-.34 2.38.96 1.38-2.4-2.03-1.58.07-.56c.03-.26.06-.51.06-.78s-.03-.53-.06-.78l-.07-.56 2.03-1.58-1.39-2.4-2.39.96-.45-.35c-.42-.32-.87-.58-1.33-.77l-.52-.22-.37-2.55h-2.76l-.37 2.55-.53.21c-.44.19-.88.44-1.34.79l-.45.33-2.38-.95-1.39 2.39 2.03 1.58-.07.56a7 7 0 0 0-.06.79c0 .26.02.53.06.78l.07.56-2.03 1.58 1.38 2.4 2.39-.96.45.35c.43.33.86.58 1.33.77l.53.22.38 2.55z"></path>
          <circle cx="12" cy="12" r="3.5"></circle>
        </svg> <span class="nav-label">Settings</span>
      </a>
    </nav>
    <div class="join-class-overlay" id="joinClassOverlay">
      <div class="join-class-modal">

        <div class="join-class-head">
          Join class
        </div>

        <form method="POST" action="{{ route('student.join.class') }}">
          @csrf

          <div class="join-class-body">

            {{-- Signed in account --}}
            <div class="join-class-account-box">

              <div class="join-class-signedin-label">
                You're currently signed in as
              </div>

              <div class="join-class-account-row">

                {{-- First Letter Avatar --}}
                <div class="join-class-avatar d-flex align-items-center justify-content-center">
                  {{ strtoupper(substr(trim($student->full_name ?? 'U'), 0, 1)) }}
                </div>

                <div>

                  <div class="join-class-name">
                    {{ $student->full_name ?? 'Student' }}
                    {{ $student->last_name ?? '' }}
                  </div>

                  <div class="join-class-email">
                    {{ $student->email_address ?? '' }}
                  </div>

                </div>

              </div>

              <button type="button" class="join-class-switch-btn">
                Switch account
              </button>

            </div>


            {{-- Class Code --}}
            <div class="join-class-code-box">

              <div class="join-class-code-label">
                Class code
              </div>

              <div class="join-class-code-sub">
                Ask your teacher for the class code, then enter it here.
              </div>

              <input
                type="text"
                class="join-class-code-input"
                placeholder="Class code"
                id="joinClassCodeInput"
                name="class_code"
                maxlength="8"
                required>

              @error('class_code')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
              @enderror

            </div>



          </div>


          {{-- Footer --}}

          <div class="join-class-footer">
            <button type="button" class="join-class-cancel-btn" id="joinClassCancelBtn">
              Cancel
            </button>

            <button type="submit"
              class="join-class-join-btn active"
              id="joinClassJoinBtn">
              Join
            </button>
          </div>
          ```


        </form>

      </div>
    </div>
    @yield("body")
    <script>
      document.addEventListener('DOMContentLoaded', function() {

        const toggle = document.getElementById('profileToggle');
        const menu = document.getElementById('profileMenu');

        if (!toggle || !menu) return;

        toggle.addEventListener('click', function(e) {

          e.stopPropagation();

          menu.classList.toggle('show');

        });


        menu.addEventListener('click', function(e) {

          e.stopPropagation();

        });


        document.addEventListener('click', function() {

          menu.classList.remove('show');

        });

      });
    </script>
    <script>
      const joinClassLink = document.getElementById('joinClassLink');
      const joinClassOverlay = document.getElementById('joinClassOverlay');
      const joinClassCancelBtn = document.getElementById('joinClassCancelBtn');
      const joinClassCodeInput = document.getElementById('joinClassCodeInput');
      const joinClassJoinBtn = document.getElementById('joinClassJoinBtn');
      const addClassMenu2 = document.getElementById('addClassMenu');

      joinClassLink.addEventListener('click', function(e) {
        e.preventDefault();
        addClassMenu2.classList.remove('open');
        joinClassOverlay.classList.add('open');
      });

      joinClassCancelBtn.addEventListener('click', closeJoinClassModal);
      joinClassOverlay.addEventListener('click', function(e) {
        if (e.target === joinClassOverlay) closeJoinClassModal();
      });

      function closeJoinClassModal() {
        joinClassOverlay.classList.remove('open');
        joinClassCodeInput.value = '';
        joinClassJoinBtn.disabled = true;
        joinClassJoinBtn.classList.remove('active');
      }

      joinClassCodeInput.addEventListener('input', function() {
        const hasCode = joinClassCodeInput.value.trim().length > 0;
        joinClassJoinBtn.disabled = !hasCode;
        joinClassJoinBtn.classList.toggle('active', hasCode);
      });

      const addClassBtn = document.getElementById('addClassBtn');
      const addClassMenu = document.getElementById('addClassMenu');

      addClassBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        addClassMenu.classList.toggle('open');
      });

      document.addEventListener('click', function(e) {
        if (!addClassMenu.contains(e.target) && e.target !== addClassBtn) {
          addClassMenu.classList.remove('open');
        }
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Frontend_theme/js/sidebar.js') }}"></script>
</body>

</html>