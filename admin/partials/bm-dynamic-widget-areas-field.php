<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       bang-media.com
 * @since      1.0.0
 *
 * @package    Bm_Dynamic_Widget_Areas
 * @subpackage Bm_Dynamic_Widget_Areas/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="bm-dwa-area-item">
	<p>
		<input type="text" name="<?php echo $this->option_name.'['.$area_count.'][name]';?>" id="bm-dwa-widget-name-<?php echo $area_count;?>" value="<?php echo $area['name']; ?>"/> 
		<input hidden type="text" name="<?php echo $this->option_name.'['.$area_count.'][id]';?>" id="bm-dwa-widget-id-<?php echo $area_count;?>" value="bm-dwa-widget-id-<?php echo $area_count;?>"/> 
		<a href="#" class="bm-dwa-area-item-remove">Remove</a>
	</p>
</div>
	