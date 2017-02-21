<!--Navigation bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Icon" src="images/icon.png" class="iconImg" style="display:inline-block;"><span style="color:#FFF;">Mia's Weather</span>
      </a>
    </div>

    <form class="navbar-form navbar-right" role="search" method="post" action="search.php" >
      <div class="form-group">
        <div id="locationField">
          <input class="form-control" id="autocomplete" placeholder="Type a city" onFocus="geolocate()" type="text">
        </div>
        <input type='hidden' id="lat" name="lat" type="text" value="">
        <input type='hidden' id="lng" name="lng" type="text" value="">
        <input type='hidden' id="city" name="city" type="text" value="">
        <input type='hidden' id="state" name="state" type="text" value="">
        <input type='hidden' id="country" name="country" type="text" value="">
      </div>
      <button type="submit" class="btn btn-default" id="find" value="find">Go</button>
    </form>

   

    <table id="address" style="display:none;">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field" id="street_number"
              disabled="true"></input></td>
        <td class="wideField" colspan="2"><input class="field" id="route"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <!-- Note: Selection of address components in this example is typical.
             You may need to adjust it for the locations relevant to your app. See
             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
        -->
        <td class="wideField" colspan="3"><input class="field" id="locality"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input class="field"
              id="administrative_area_level_1" disabled="true"></input></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field"
              id="country" disabled="true"></input></td>
      </tr>
    </table>
  </div>
</nav>

        
  