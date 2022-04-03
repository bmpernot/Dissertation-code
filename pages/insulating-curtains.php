<div class="container">
  <h1 class="mb-4 pb-2">Insulating Curtains</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Thermal curtains are made from several layers of an insulating materials that provide thermal resistance and prevent thermal transmittance or conductivity. Depending on the product the curtain can use anywhere between two and four layer of the material, but the average is three layers. The layers are as follows:<br>
        - Layer 1 - Made from densely woven fabric and is designed to be attractive.<br>
        - Layer 2 - Made from a thermally resistant material and is designed to reduce heat transfer.<br>
        - Layer 3 - Made from cotton, reflective film, vinyl or other materials and is designed to protect layer two from daylight damage <br>
        - Layer 4 - made from cotton, reflective film, vinyl or other materials and is designed to act as a vapour barrier agaist moisture built up.<br>
        Most curtains combine layer 3 and 4.
      </p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              $number_of_windows = $User_House['window_number_first_floor'] + $User_House['window_number_second_floor'] + $User_House['window_number_thrid_floor'];
              if($number_of_windows > 0 && $User_House['window_area'] > 0){ ?>
                <h2>Estimated Price:</h1>
                <h1>£10-£250 depending on style, size and functionality.</h1>
                <h2>Estimated Savings:</h1>
                <h1>Reduces heat transmission by approximately 19%</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>For the insulating curtains to be effective they need to be as airtight as possible so they are the only object the heat can transfer through to get to the windows. This means that the curtain needs to be installed so that it is as close to the window/wall as it can possible be and it has a seal around all the side of the window. If extra side want to be taken to ensure airtightness, Velcro, magnetic tape or hooks can be installed to the sides. The curtains should overlap generously in the centre of the window to prevent air from going through the gap between the curtains.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>Depending on where the house is located will determine if the summer and winter is cold or hot. However if it is cold the curtains can be open during the day to allow sunlight in and warm the house then at night the curtains will need to be closed so that the heat can be retained during the night. When it is hot the curtains should be closed during the day to reflect the heat from the sun back outside to keep the house cool, during the night the curtains could be opened to expel any remaining heat in the house. However if the curtains are open during the night it is most likely that the residents of the house will wake up earlier due to the sunrise.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Insulating curtains create a dead-air space between the window and the room which reduces the heat transfer. Insulating materials are measured in R values. see examples of R values below to compare insulation effectiveness<br>
      - Single pane windows -	R-1<br>
      - Insulated (double and triple glazed) windows - R-2 – R-7<br>
      - Insulated walls -	R-15<br>
      - Standard curtains -	R-1<br>
      - Insulated curtains -	R-6
    </p>
  </div>
</div>
