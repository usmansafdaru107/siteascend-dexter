<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
		
        <li>
          <a href="{{ route('admin.dashboard') }}">
            <i class="mdi mdi-view-dashboard"></i>
			<span>Dashboard</span>
          </a>
        </li> 
		
        <li class="header">PAGES</li>

        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-account-settings"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.userslist') }}"><i class="ti-more"></i>Userlist</a></li>
			<li><a href="contact_userlist.html"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-email"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
            <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
          </ul>
        </li>
		<li>
          <a href="contact_app_chat.html">
            <i class="mdi mdi-comment-outline"></i>
			<span>Users</span>
          </a>
        </li> 
		<li>
          <a href="extra_taskboard.html">
            <i class="mdi mdi-content-duplicate"></i>
			<span>Todo</span>
          </a>
        </li>
		<li>
          <a href="extra_calendar.html">
            <i class="mdi mdi-calendar"></i>
			<span>Calendar</span>
          </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-border-color"></i>
			<span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
			<li><a href="invoicelist.html"><i class="ti-more"></i>Invoice List</a></li>	
          </ul>
        </li>
		<li>
          <a href="contact_app.html">
            <i class="mdi mdi-account-box-outline"></i>
			<span>Contact / Employee</span>
          </a>
        </li>
		<li>
          <a href="extra_app_ticket.html">
            <i class="mdi mdi-ticket-account"></i>
			<span>Support Ticket</span>
          </a>
        </li>			  
		
        <li class="header">UI Elements</li>
		  
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-matrix"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ui_typography.html"><i class="ti-more"></i>Typography</a></li>
            <li><a href="ui_grid.html"><i class="ti-more"></i>Grid</a></li>
            <li><a href="ui_tab.html"><i class="ti-more"></i>Tabs</a></li>
            <li><a href="ui_timeline.html"><i class="ti-more"></i>Timeline</a></li>
            <li><a href="ui_timeline_horizontal.html"><i class="ti-more"></i>Horizontal Timeline</a></li>
          </ul>
        </li>	  
		
		<li>
          <a href="ui_color_utilities.html">
            <i class="mdi mdi-format-color-fill"></i>
			<span>Color</span>
          </a>
        </li>        
		
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-format-color-text"></i>
            <span>Icons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>	
            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
          </ul>
        </li> 
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-flip-to-front"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="box_cards.html"><i class="ti-more"></i>User Card</a></li>
			<li><a href="box_advanced.html"><i class="ti-more"></i>Advanced Card</a></li>
            <li><a href="box_basic.html"><i class="ti-more"></i>Basic Card</a></li>
            <li><a href="box_color.html"><i class="ti-more"></i>Card Color</a></li>
			<li><a href="box_group.html"><i class="ti-more"></i>Card Group</a></li>
          </ul>
        </li>	  		  
        
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-image-filter"></i>
            <span>Widgets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="widgets_blog.html"><i class="ti-more"></i>Blog</a></li>
            <li><a href="widgets_chart.html"><i class="ti-more"></i>Chart</a></li>
            <li><a href="widgets_list.html"><i class="ti-more"></i>List</a></li>
            <li><a href="widgets_social.html"><i class="ti-more"></i>Social</a></li>
            <li><a href="widgets_statistic.html"><i class="ti-more"></i>Statistic</a></li>
            <li><a href="widgets_weather.html"><i class="ti-more"></i>Weather</a></li>
            <li><a href="widgets.html"><i class="ti-more"></i>Widgets</a></li>
          </ul>
        </li>  
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-dice-4"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">			
            <li><a href="component_bootstrap_switch.html"><i class="ti-more"></i>Bootstrap Switch</a></li>
            <li><a href="component_date_paginator.html"><i class="ti-more"></i>Date Paginator</a></li>
            <li><a href="component_media_advanced.html"><i class="ti-more"></i>Advanced Medias</a></li>
			<li><a href="component_modals.html"><i class="ti-more"></i>Modals</a></li>
            <li><a href="component_rangeslider.html"><i class="ti-more"></i>Range Slider</a></li>
            <li><a href="component_rating.html"><i class="ti-more"></i>Ratings</a></li>
            <li><a href="component_animations.html"><i class="ti-more"></i>Animations</a></li>
          </ul>
        </li>
		  
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-crop"></i>
            <span>Extra Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ui_badges.html"><i class="ti-more"></i>Badges</a></li>
            <li><a href="ui_border_utilities.html"><i class="ti-more"></i>Border</a></li>
            <li><a href="ui_buttons.html"><i class="ti-more"></i>Buttons</a></li>	
            <li><a href="ui_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="ui_dropdown_grid.html"><i class="ti-more"></i>Dropdown Grid</a></li>
            <li><a href="ui_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
            <li><a href="ui_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
            <li><a href="ui_sliders.html"><i class="ti-more"></i>Sliders</a></li>
          </ul>
        </li> 			
		  
		
        <li class="header">Forms & Tables</li>  
		
		<li>
          <a href="forms_advanced.html">
            <i class="mdi mdi-file-document"></i>
			<span>Form Elements</span>
          </a>
        </li>  		
		<li>
          <a href="forms_general.html">
            <i class="mdi mdi-file-chart"></i>
			<span>Form Layout</span>
          </a>
        </li>	
		<li>
          <a href="forms_wizard.html">
            <i class="mdi mdi-debug-step-over"></i>
			<span>Form Wizard</span>
          </a>
        </li>	
		<li>
          <a href="forms_validation.html">
            <i class="mdi mdi-file-check"></i>
			<span>Form Validation</span>
          </a>
        </li>	
		<li>
          <a href="forms_mask.html">
            <i class="mdi mdi-file-send"></i>
			<span>Formatter</span>
          </a>
        </li>	
		<li>
          <a href="forms_xeditable.html">
            <i class="mdi mdi-file-tree"></i>
			<span>Xeditable Editor</span>
          </a>
        </li>	
		<li>
          <a href="forms_dropzone.html">
            <i class="mdi mdi-dropbox"></i>
			<span>Dropzone</span>
          </a>
        </li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-table-large"></i>
			<span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
            <li><a href="tables_editable.html"><i class="ti-more"></i>Editable Tables</a></li>
            <li><a href="tables_color.html"><i class="ti-more"></i>Table Color</a></li>
          </ul>
        </li>
		  
		
        <li class="header">Pages</li> 	
		  
		<li>
          <a href="extra_profile.html">
            <i class="mdi mdi-account-card-details"></i>
			<span>User Profile</span>
          </a>
        </li>	
		  
		<li>
          <a href="sample_faq.html">
            <i class="mdi mdi-calendar-question"></i>
			<span>FAQ</span>
          </a>
        </li>
		  
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-account-settings"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="contact_userlist_grid.html"><i class="ti-more"></i>Userlist Grid</a></li>
			<li><a href="contact_userlist.html"><i class="ti-more"></i>Userlist</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-lock-plus"></i>
			<span>Authentication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
            <li><a href="auth_login2.html"><i class="ti-more"></i>Login 2</a></li>
			<li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
			<li><a href="auth_register2.html"><i class="ti-more"></i>Register 2</a></li>
			<li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
			<li><a href="auth_user_pass.html"><i class="ti-more"></i>Recover password</a></li>	
          </ul>
        </li>	  
		  
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-alert-outline"></i>
			<span>Miscellaneous</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="error_400.html"><i class="ti-more"></i>Error 400</a></li>
			<li><a href="error_403.html"><i class="ti-more"></i>Error 403</a></li>
			<li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
			<li><a href="error_500.html"><i class="ti-more"></i>Error 500</a></li>
			<li><a href="error_503.html"><i class="ti-more"></i>Error 503</a></li>
			<li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>	
          </ul>
        </li>
		  
		<li class="header">Charts & Maps</li>		  
		
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-chart-arc"></i>
			<span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
            <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
            <li><a href="charts_inline.html"><i class="ti-more"></i>Inline charts</a></li>
            <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
            <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
            <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
          </ul>
        </li>		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-chart-areaspline"></i>
			<span>C3 Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts_c3_axis.html"><i class="ti-more"></i>Axis Chart</a></li>
            <li><a href="charts_c3_bar.html"><i class="ti-more"></i>Bar Chart</a></li>
            <li><a href="charts_c3_data.html"><i class="ti-more"></i>Data Chart</a></li>
            <li><a href="charts_c3_line.html"><i class="ti-more"></i>Line Chart</a></li>
          </ul>
        </li>
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-chart-line"></i>
			<span>Echarts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts_echarts_basic.html"><i class="ti-more"></i>Basic Charts</a></li>
            <li><a href="charts_echarts_bar.html"><i class="ti-more"></i>Bar Chart</a></li>
            <li><a href="charts_echarts_pie_doughnut.html"><i class="ti-more"></i>Pie & Doughnut Chart</a></li>
          </ul>
        </li>
		<li>
          <a href="map_google.html">
            <i class="mdi mdi-google-maps"></i>
			<span>Google Map</span>
          </a>
        </li>
		<li>
          <a href="map_vector.html">
            <i class="mdi mdi-home-map-marker"></i>
			<span>Vector Map</span>
          </a>
        </li>
		  
		<li class="header">Extensions</li>
		  
		<li>
          <a href="component_sweatalert.html">
            <i class="mdi mdi-alert-box"></i>
			<span>Sweet Alert</span>
          </a>
        </li> 		  
		<li>
          <a href="component_notification.html">
            <i class="mdi mdi-notification-clear-all"></i>
			<span>Toastr</span>
          </a>
        </li>		  
		<li>
          <a href="extension_fullscreen.html">
            <i class="mdi mdi-fullscreen"></i>
			<span>Fullscreen</span>
          </a>
        </li> 		  
		<li>
          <a href="extension_pace.html">
            <i class="mdi mdi-reload"></i>
			<span>Pace</span>
          </a>
        </li> 		  
		<li>
          <a href="component_nestable.html">
            <i class="mdi mdi-format-align-center"></i>
			<span>Nestable</span>
          </a>
        </li>	  
		<li>
          <a href="component_portlet_draggable.html">
            <i class="mdi mdi-drag"></i>
			<span>Draggable Portlets</span>
          </a>
        </li>  
		
		<li class="header">Other Pages</li>
		  
		<li>
          <a href="email_index.html">
            <i class="mdi mdi-email-outline"></i>
			<span>Emails</span>
          </a>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-basket"></i>
			<span>Ecommerce Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ecommerce_products.html"><i class="ti-more"></i>Products</a></li>
            <li><a href="ecommerce_cart.html"><i class="ti-more"></i>Products Cart</a></li>
            <li><a href="ecommerce_products_edit.html"><i class="ti-more"></i>Products Edit</a></li>
            <li><a href="ecommerce_details.html"><i class="ti-more"></i>Product Details</a></li>
            <li><a href="ecommerce_orders.html"><i class="ti-more"></i>Product Orders</a></li>
            <li><a href="ecommerce_checkout.html"><i class="ti-more"></i>Products Checkout</a></li>
          </ul>
        </li>	  	   
		  
		<li class="treeview">
          <a href="#">
            <i class="mdi mdi-fax"></i>
			<span>Sample Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="sample_blank.html"><i class="ti-more"></i>Blank</a></li>
            <li><a href="sample_coming_soon.html"><i class="ti-more"></i>Coming Soon</a></li>
            <li><a href="sample_custom_scroll.html"><i class="ti-more"></i>Custom Scrolls</a></li>
			<li><a href="sample_gallery.html"><i class="ti-more"></i>Gallery</a></li>
			<li><a href="sample_lightbox.html"><i class="ti-more"></i>Lightbox Popup</a></li>
			<li><a href="sample_pricing.html"><i class="ti-more"></i>Pricing</a></li>
          </ul>
        </li>  
		  
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-chart-timeline"></i>
			<span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>  
		  
		<li>
          <a href="auth_login.html">
            <i class="mdi mdi-export"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
  </aside>
