@php
  $prefix=userType();
@endphp
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark gradient-45deg-deep-purple-blue sidenav-gradient sidenav-active-rounded">
<div class="brand-sidebar">
  <h1 class="logo-wrapper">
    <a class="brand-logo darken-1" href="index.html">
      <img class="hide-on-med-and-down " src="{{asset('app-assets/images/logo/materialize-logo.png" alt="materialize logo')}}" />
      <img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('app-assets/images/logo/materialize-logo-color.png')}}" alt="materialize logo" />
      <span class="logo-text hide-on-med-and-down">Matrix Farm</span>
    </a>
    <a class="navbar-toggler" href="#">
      <i class="material-icons">radio_button_checked</i>
    </a>
  </h1>
</div>
<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
  
  
  <li class="navigation-header">
    <a class="navigation-header-text">Applications</a>
    <i class="navigation-header-icon material-icons">more_horiz</i>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/requirement')}}">
      <i class="material-icons">mail_outline</i>
      <span class="menu-title" data-i18n="Mail">Requirement</span>
      <!-- <span class="badge new badge pill pink accent-2 float-right mr-2">5</span> -->
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/capacity')}}">
      <i class="material-icons">chat_bubble_outline</i>
      <span class="menu-title" data-i18n="Chat">Capacity</span>
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/publish')}}">
      <i class="material-icons">check</i>
      <span class="menu-title" data-i18n="ToDo">Publish</span>
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/partner')}}">
      <i class="material-icons">format_list_bulleted</i>
      <span class="menu-title" data-i18n="Kanban">Partmer</span>
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="app-{{url($prefix.'/users')}}">
      <i class="material-icons">content_paste</i>
      <span class="menu-title" data-i18n="File Manager">Users</span>
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/email')}}">
      <i class="material-icons">mail_outline</i>
      <span class="menu-title" data-i18n="Mail">Email</span>
    </a>
  </li>
  <li class="bold">
    <a class="waves-effect waves-cyan " href="{{url($prefix.'/help')}}">
      <i class="material-icons">help_outline</i>
      <span class="menu-title" data-i18n="Support">Help</span>
    </a>
  </li>
  <!-- <li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
      <i class="material-icons">receipt</i>
      <span class="menu-title" data-i18n="Invoice">Invoice</span>
    </a>
    <div class="collapsible-body">
      <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li>
          <a href="app-invoice-list.html">
            <i class="material-icons">radio_button_unchecked</i>
            <span data-i18n="Invoice List">Invoice List</span>
          </a>
        </li>
        <li>
          <a href="app-invoice-view.html">
            <i class="material-icons">radio_button_unchecked</i>
            <span data-i18n="Invoice View">Invoice View</span>
          </a>
        </li>
        <li>
          <a href="app-invoice-edit.html">
            <i class="material-icons">radio_button_unchecked</i>
            <span data-i18n="Invoice Edit">Invoice Edit</span>
          </a>
        </li>
        <li>
          <a href="app-invoice-add.html">
            <i class="material-icons">radio_button_unchecked</i>
            <span data-i18n="Invoice Add">Invoice Add</span>
          </a>
        </li>
      </ul>
    </div>
  </li> -->
  
</ul>
<div class="navigation-background"></div>
<a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
  <i class="material-icons">menu</i>
</a>
</aside>