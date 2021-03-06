<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ghostnote
 */

get_header();
?>
<main>
    <nav id="myBtnContainer">
      <p style="	padding-right: 15px;"> Filter By</p>
      <p> <span class="vertical"></span></p>
     <button class="btn" onclick="filterSelection('category-copyright')">Copyright</button>
      <button class="btn" onclick="filterSelection('category-cultural-heritage')">Cultural Heritage</button> 
      <button id="reset"  class="btn active clear" onclick="filterSelection('all')">Show All</button> 
    </nav>
    <div class="container">
    <div class="row">
      <!--Top Section-->

      <!-- <div class="row">
        <div class="box copyright">
          <a href="#" rel="noopener noreferrer">
          <h5>Copyright</h5>
          <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
          <p><span>Read More</span></p>
          </a>
        </div>
        <div class="box cultural_heritage">
          <a href="#"  rel="noopener noreferrer">
        <h5>Cultural Heritage</h5>
        <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
        <p><span>Read More</span></p>
        </a>
        </div>
        <div class="box copyright">
          <a href="#" rel="noopener noreferrer">
        <h5>Copyright</h5>
        <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
        <p><span>Read More</span></p>
        </a>
        </div> -->
      
      <!--Bottom Section-->
<!--       
        <div class="box cultural_heritage">
          <a href="#" rel="noopener noreferrer">
        <h5>Cultural Heritage</h5>
        <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
        <p><span>Read More</span></p>
        </a>
        </div>
        <div class="box copyright">
          <a href="#" rel="noopener noreferrer">
        <h5>Copyright</h5>
        <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
          <p><span>Read More</span></p>
          </a>
        </div>
        <div class="box cultural_heritage">
          <a href="#"  rel="noopener noreferrer">
          <h5>Cultural Heritage</h5>
          <p>Intellectual Property "From Below": Copyright and Capability for Education</p>
          <p><span>Read More</span></p>
          </a>
          </div>
      </div> -->

      <?php 
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('box'); ?>>
        <?php the_title( '<h5>', '</h5>' ); ?> 
        <?php the_excerpt(); ?>
        <p><span>Read More</span></p>
        </article>
        <?php endwhile; 
else: 
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
endif; 
?>

      </div>
      </div>
  </main>


<script>


filterSelection("all") // Execute the function and show all columns
function  filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("box");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show"); 
  }
}

// Show filtered elements
function addClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
  
}

// Hide elements that are not selected
function removeClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
var show = document.getElementById('reset');
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    if (show.classList.contains("active")){
    show.classList.add('clear');
  } else{
    show.classList.remove('clear');
  }
  });
}

</script>



