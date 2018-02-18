<?php
class nav_bar {
  protected $nav_pages = array('home','about','reviews','FAQ','sets','pics','contact');
  protected $nav_logos = array("twitter"=>"https://twitter.com");
  protected $site_title = 'Anthony Mustachio Comedy';
  protected $title_before = true; // does the title come before or after the nav
  function setNavBar(){
    // builds the navigation menu and title into the header 
    // you're using a router, so those links are just the words for the router to find
    $title_classed = '<a href="home" class="nav-title-link"><h1 class="nav-title-base nav-title-style">' . $this->site_title . '</h1></a>';
    if ($this->title_before) {
      echo $title_classed;
    }
    echo '<nav>';
    foreach($this->nav_pages as $nav_item) {
      echo '<a href="' .  $nav_item . '" class="nav-page-base nav-page-style">'
          . ucfirst($nav_item) . ' </a><div></div>';
    }
    foreach($this->nav_logos as $nav_logo=>$logo_link) {
      echo '
        <a href="' . $logo_link . '" class="nav-logo-base nav-logo-style">
          <img src="images/soc-logos/' . $nav_logo . '.png" alt="' . $nav_logo . '" />
        </a>';
    }
    echo "</nav>";    
    if (!$this->title_before) {
      echo $title_classed;
    }
  }
}
class homepage {
  protected $site_owner = 'Anthony Mustacchio'; 
  // Homepage variables 
  protected $headline_names = array('Anthony', 'MUSTACCHIO');
  protected $subtitle = 'Stand Up Comic';
  protected $main_quote = 'Yes, that is my real name, its on my drivers license';
  protected $buttons = array('sets','contact');
  // add this to the button loop if the button values are different than the pages
  protected $button_msgs = array(''); 
  function set_headline_section() {
    $headline_names_len = sizeof($this->headline_names);
    $headline_section = '';
    for($i=0;$i<$headline_names_len;$i++) {
      $headline_section .= '
        <h1 class="home-headline-' . $i . '-base home-headline-' . $i . '-style">' 
          . $this->headline_names[$i] .
        '</h1>';
    }
    return $headline_section;
  }
  function set_button_section() {
    $button_section = '';
    $buttons_len = sizeof($this->buttons); 
    for($i=0;$i<$buttons_len;$i++) {
      $button_section .= '
        <form action="' . $this->buttons[$i] . '">
            <input type="submit" class="home-button-base home-button-style" value="' 
            . ucfirst($this->buttons[$i]) . '" /> 
        </form>';
    }
    return $button_section;
  }
  function set_homepage() {
    $this->set_button_section();
    echo '
    <div class="home-feat-img-base home-feat-img-style">
      <img src="images/home-feat-img/feat-img.jpg" alt="It\'s ' . $this->site_owner .'" />
    </div>
      <div id="home-holder">
        <div class="home-board-base home-board-style">' 
          . $this->set_headline_section() .
        '<h2 class="home-subtitle-base home-subtitle-style">'
          . $this->subtitle .  
        '</h2>
        <hr />
        <p class="home-quote-base home-quote-style">'
          . $this->main_quote . 
        '</p>
      </div>
      <div class="home-buttons-base home-buttons-style">
        <!-- form buttons are used as links because i want a constant width for buttons, 
        and padding each link wont work that way -->'
        . $this->set_button_section() .
      '</div>
    </div>';
  }
}

?>
