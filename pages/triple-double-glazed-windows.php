<div class="container">
  <h1 class="mb-4 pb-2">Triple/Double Glazed Windows</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Double or triple glazed glass refers to having multiple panes of glass against each other with a dense gas such as argon in between each pane to act as an insulator for both heat and sound. The glass can easily be replaced as all the structural requirements are already met so it is a matter of uninstalling and reinstalling. However, depending on the material used to hold the glass, price can differ dramatically.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              $number_of_windows = $User_House['window_number_first_floor'] + $User_House['window_number_second_floor'] + $User_House['window_number_thrid_floor'];
              if($number_of_windows > 0 && $User_House['window_area'] > 0){
                $average_window_size = $User_House['window_area']/$number_of_windows;
                if($average_window_size > 0 && $average_window_size < 1.08){
                  $uPVC_ground_price_low = 150;
                  $uPVC_first_second_price_low = 300;
                  $uPVC_ground_price_high = 350;
                  $uPVC_first_second_price_high = 450;
                  $Aluminium_ground_price_low = 500;
                  $Aluminium_first_second_price_low = 600;
                  $Aluminium_ground_price_high = 600;
                  $Aluminium_first_second_price_high = 700;
                  $Timber_ground_price_low = 800;
                  $Timber_first_second_price_low = 900;
                  $Timber_ground_price_high = 950;
                  $Timber_first_second_price_high = 1050;
                }elseif ($average_window_size >= 1.08 && $average_window_size < 1.44) {
                  $uPVC_ground_price_low = 400;
                  $uPVC_first_second_price_low = 450;
                  $uPVC_ground_price_high = 550;
                  $uPVC_first_second_price_high = 600;
                  $Aluminium_ground_price_low = 650;
                  $Aluminium_first_second_price_low = 750;
                  $Aluminium_ground_price_high = 800;
                  $Aluminium_first_second_price_high = 900;
                  $Timber_ground_price_low = 1200;
                  $Timber_first_second_price_low = 1300;
                  $Timber_ground_price_high = 1300;
                  $Timber_first_second_price_high = 1400;
                }elseif ($average_window_size >= 1.44 ) {
                  $uPVC_ground_price_low = 650;
                  $uPVC_first_second_price_low = 750;
                  $uPVC_ground_price_high = 800;
                  $uPVC_first_second_price_high = 900;
                  $Aluminium_ground_price_low = 750;
                  $Aluminium_first_second_price_low = 900;
                  $Aluminium_ground_price_high = 1000;
                  $Aluminium_first_second_price_high = 1100;
                  $Timber_ground_price_low = 1350;
                  $Timber_first_second_price_low = 1450;
                  $Timber_ground_price_high = 1500;
                  $Timber_first_second_price_high = 1600;
                }
                $average_price_ground_floor = ($uPVC_ground_price_low + $uPVC_ground_price_high + $Aluminium_ground_price_low + $Aluminium_ground_price_high + $Timber_ground_price_low + $Timber_ground_price_high)/6;
                $average_price_first_second_floor = ($uPVC_first_second_price_low + $uPVC_first_second_price_high + $Aluminium_first_second_price_low + $Aluminium_first_second_price_high + $Timber_first_second_price_low + $Timber_first_second_price_high)/6;
                $payback = (($User_House['window_number_first_floor'] * $average_price_ground_floor) + (($User_House['window_number_second_floor'] + $User_House['window_number_thrid_floor']) * $average_price_first_second_floor)/145;
                ?>
                <h2>Estimated Price (Window Frame Material - Price):</h2>
                <p>Price increase by 10-20% if triple glazed windows are installed.</p>
                <h1>uPVC - Window on Ground Floor:£<?php  echo $uPVC_ground_price_low;?>-£<?php  echo $uPVC_ground_price_high; ?> - Window on First/Second Floor:£<?php  echo $uPVC_first_second_price_low;?>-£<?php  echo $uPVC_first_second_price_high; ?></h1>
                <h1>Aluminium - Window on Ground Floor:£<?php  echo $Aluminium_ground_price_low;?>-£<?php  echo $Aluminium_ground_price_high; ?> - Window on First/Second Floor:£<?php  echo $Aluminium_first_second_price_low;?>-£<?php  echo $Aluminium_first_second_price_high; ?></h1>
                <h1>Timber - Window on Ground Floor:£<?php  echo $Timber_ground_price_low; ?>-£<?php  echo $Timber_ground_price_high; ?> - Window on First/Second Floor:£<?php  echo $Timber_first_second_price_low;?>-£<?php  echo $Timber_first_second_price_high; ?></h1>
                <p>For example, If a semi-detached gas heated property with single paned windows were to have all windows replaced with double or triple glazed windows the following would apply:</p>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>Double (A Rated) Glazed Windows: £145<br>Triple (A++ Rated) Glazed Windows: £175</h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1>Double (A Rated) Glazed Windows: 335Kg<br>Triple (A++ Rated) Glazed Windows: 410Kg</h1>
                <h2>Payback Time:</h2>
                <h1><?php  echo(round($payback, 2)); ?> Years</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option as it requires windows.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>Due to UK government building regulations standards it is recommended to choose an installer who is registered with one of the official competent person schemes otherwise application for building control approval is required before installing the windows. However, once materials have been acquired it is a simple job for the contractor to remove the old window and install the new windows while making it airtight.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>There is no functional differences between single paned windows and double or triple glazed windows, so they operate in the same way depending on the variety that was acquired.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Due to the glass panes being separated by argon gas it reduce the heat transfer as argon gas is a poor conductor of heat. This reduce the effect of the losing energy to the outside by keeping it inside the house. In addition as there are two or three glass panes the noise is reduced by up to 40dB as each of the panes are coated in a laminate which absorbs the sounds wave. This also allows for solar gain which is where the energy from the sun can enter the house but cannot leave as it turns from a short wave to a long wave once passing through the panes of glass therefore reduce heating costs.</p>
  </div>
</div>
