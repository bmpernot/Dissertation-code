<div class="container">
  <h1 class="mb-4 pb-2">Compost</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Composting is a natural way of transforming leftover foods and compostable materials into a highly nutritious soil. It is a great inexpensive way to reduce the amount of waste that goes to landfill sites by turning it into useful product.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if($User_House['garden_width']*$User_House['garden_length'] <= 0){ ?>
                <h2>Estimated Price:</h2>
                <h1>Plastic: £25-£75<br>Wooden: £40-£100<br>Heat Retaining: £150-£250<br>Worm: £50-£300</h1>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option as it requires space outside to place.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>In order to stop unwanted creatures from staying in the bins a wire mesh can be added to the bottom of the bin. Depending on the surface that the bin is being installed on will require different instructions to setup. The best place to put a compost bin is to attach it to the soil. This is so that any liquids can be drained into the earth and worms can find their way to the compost to speed up the process. However, if the bin must be placed on a different such as paving, decking, gravel or concrete adding a compost bin base will be necessary to reduce the amount of damage that will occur to the surface.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>In order to make compost a balance between “Green” and “Brown” should be applied. See appendix A for more information. This mixture should be a 50/50 split however, it is absolutely necessary to keep this balance in order to make compost. There are some objects that should never be added to the composting bin, see appendix A for more information, as they do not compost or rot which could cause diseases.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>The composting process can be split into three stages, the mesophilic, the thermophilic, and maturation stages. During the first stage the temperature starts to rise and different microorganisms are introduced to catalyse the process. During the second phase the microorganisms accelerate the breakdown of proteins, fats and complex carbohydrates. Once this supply starts to deplete the process cools down and the final phase beings. During the final phase the remaining organic matter starts to settle as the microorganisms die as they are designed for higher temperatures.</p>
  </div>
</div>
