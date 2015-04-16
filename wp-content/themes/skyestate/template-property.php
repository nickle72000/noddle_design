<?php
/**
 * Template Name: Property
 *
 * A custom page template for property page.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Skyestate
 * @since Skyestate 1.0
 */

get_header(); 
//print_r($_SESSION);
?>

	<?php
    $nvr_initial = THE_INITIAL;
	$nvr_shortname = THE_SHORTNAME;
	
	$nvr_cursymbol = nvr_get_option( $nvr_shortname . '_currency_symbol');
	$nvr_curplace = nvr_get_option( $nvr_shortname . '_currency_place');
	$nvr_unit = nvr_get_option( $nvr_shortname . '_measurement_unit');
	
	$nvr_pid = nvr_get_postid();
	$nvr_custom = nvr_get_customdata($nvr_pid);
    $nvr_cats = (isset($nvr_custom["prop_categories"][0]))? $nvr_custom["prop_categories"][0] : "";
    $nvr_showpost = (isset($nvr_custom["prop_showpost"][0]))? $nvr_custom["prop_showpost"][0] : "";
    $nvr_orderby = (isset($nvr_custom["prop_orderby"][0]))? $nvr_custom["prop_orderby"][0] : "date";
    $nvr_ordersort = (isset($nvr_custom["prop_sort"][0]))? $nvr_custom["prop_sort"][0] : "DESC";
    $nvr_categories = explode(",",$nvr_cats);
	$nvr_argquery2='';
	$nvr_propterm = 'property_category';
	
	$nvr_approvedcats = array();
	foreach($nvr_categories as $nvr_category){
		$nvr_catname = get_term_by('slug',$nvr_category,$nvr_propterm);
		if($nvr_catname!=false){
			$nvr_approvedcats[] = $nvr_catname;
		}
	}

	$nvr_catslugs = array();
	$nvr_outputfilter = '';
	if(count($nvr_approvedcats)>1){
		$nvr_outputfilter .= '<ul class="filterlist property-cat-filter" class="option-set clearfix " data-option-key="filter">';
			$nvr_outputfilter .= '<li class="alpha selected"><a href="#filter" data-option-value="*">'. __('All Categories', THE_LANG ).'</a></li>';
			$nvr_filtersli = '';
			$numli = 1;
			foreach($nvr_approvedcats as $nvr_approvedcat){
				if($numli==1){
					$nvr_liclass = 'omega';
				}else{
					$nvr_liclass = '';
				}
				$nvr_filtersli = '<li class="'.esc_attr( $nvr_liclass ).'"><a href="#filter" data-option-value=".'. esc_attr( $nvr_approvedcat->slug ).'">'.$nvr_approvedcat->name.'</a></li>'.$nvr_filtersli;
				$nvr_catslugs[] = $nvr_approvedcat->slug;
				$numli++;
			}
			$nvr_outputfilter .= $nvr_filtersli;
		$nvr_outputfilter .= '</ul>';
		$nvr_hasfilter = true;
	}elseif(count($nvr_approvedcats)==1){
		$nvr_catslugs[] = $nvr_approvedcats[0]->slug;
		$nvr_hasfilter = false;
	}else{
		$nvr_hasfilter = false;
	}

	$nvr_idnum = 0;
	$nvr_pfcontainercls = "nvr-prop-col";
	$nvr_imgsize = "property-image";
	
	if($nvr_showpost==""){$nvr_showpost="-1";}
	
	$nvr_argquery = array(
		'post_type' => 'propertys',
		'orderby' => $nvr_orderby,
		'order' => $nvr_ordersort,
	
	);
global $search,$state,$city,$type,$status_prop,$lint,$t;
	registerglobal('state','city','type','status_prop','search');
	if($search!=''){
$nvr_argquery['search_prod_title']= $search;
$lint='?search='.$search;
}
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$nvr_paged = $paged;
	
		if($state!=""){
		$state=$state;
$nvr_argquery2[] = array(
					'key'		=> 'nvr_state',
					'value'		=> $state,
					'compare' => '=',
				);
				
				
				if($lint==""){$lint="?state=".$state;}else{$lint="&state=".$state;}
				}
				if($status_prop!=""){
		$nvr_status=$status_prop;
$nvr_argquery2[] = array(
					'key'		=> 'nvr_status',
					'value'		=> str_replace('_', ' ',$nvr_status),
					'compare' => '=',
				);
				
				
				if($lint==""){$lint="?status_prop=".$nvr_status;}else{$lint="&status_prop=".$nvr_status;}
				}
				if($type!=''){
				
				$nvr_taxquery[] = array(
					'taxonomy' 	=> 'property_category',
					'field'		=> 'slug',
					'terms'		=> $type
				);
				$nvr_argquery['tax_query'] = $nvr_taxquery;
				if($lint==""){$lint='?type='.$type;}else{$lint='&type='.$type;}
				}
				if($city!=""){
				$city=$city;
				$nvr_argquery2[] = array(
					'key'		=> 'nvr_county',
					'value'		=> $city,
					'compare' => '=',
				);
				$lint.='&city='.$city;
				}
				
	if(isset($nvr_paged)){
		$nvr_argquery['paged'] = $nvr_paged;
	}
	
	if($nvr_showpost!=''){
		$nvr_argquery['showposts'] = $nvr_showpost;
	}
	
	if(count($nvr_catslugs)>0){
		$nvr_argquery['tax_query'] = array(
			array(
				'taxonomy' => $nvr_propterm,
				'field' => 'slug',
				'terms' => $nvr_catslugs
			)
		);
	}
	
				$nvr_argquery['meta_query']=$nvr_argquery2;
				add_filter( 'posts_where', 'title_filter', 10, 2 );
				//print_r($nvr_argquery);
				//$customPosts = new WP_Query($nvr_argquery);
//echo "Last SQL-Query: {$customPosts->request}";
	query_posts($nvr_argquery); 
	global $post, $wp_query;
	?>
	<div class="property_filter">
		<?php echo $nvr_outputfilter; ?>
		<div class="nvr-prop-container row">
			<ul id="nvr-prop-filter" class="<?php echo esc_attr( $nvr_pfcontainercls ); ?>">
			<?php
			while ( have_posts() ) : the_post(); 
					
					$nvr_idnum++;
					
					$nvr_thepfterms = get_the_terms( get_the_ID(), $nvr_propterm );
					
					$nvr_literms = "";
					if ( $nvr_thepfterms && ! is_wp_error( $nvr_thepfterms ) ){
		
						$approvedterms = array();
						foreach ( $nvr_thepfterms as $term ) {
							$approvedterms[] = $term->slug;
						}			
						$nvr_literms = implode( " ", $approvedterms );
					}
					
					echo nvr_prop_get_box_custome( $nvr_imgsize, get_the_ID(), 'element columns '.$nvr_literms, $nvr_unit, $nvr_cursymbol, $nvr_curplace );
						
					$nvr_classpf=""; 
						$t=1;
			endwhile; // End the loop. Whew.
			?>
<?php if($t<=0){echo "<li><h3>No Properties Availabul</h3></li>";}?>
			<li class="nvr-prop-clear"></li>
			</ul>
			<div class="clearfix"></div>
			<div> <?php wp_pagenavi($lint); ?></div>
		</div><!-- end .nvr-property-container -->
	</div>
              
    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
     <?php if(function_exists('wp_pagenavi')) { ?>
         <?php //wp_pagenavi(); ?>
     <?php }else{ ?>
        <div id="nav-below" class="navigation">
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', THE_LANG ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', THE_LANG ) ); ?></div>
        </div><!-- #nav-below -->
    <?php }?>
    <?php endif; wp_reset_query();?>
            
    <div class="clearfix"></div><!-- clear float -->
                
<?php get_footer(); ?>
