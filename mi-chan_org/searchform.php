<?php $form = '
<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
  <div>
    <input type="text" value="" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="search" />
  </div>
</form>';
echo $form;
