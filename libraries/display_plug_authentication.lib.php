<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 *
 * @package PhpMyAdmin
 */
if (! defined('PHPMYADMIN')) {
    exit;
}

/**
 *
 */
?>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
<div class="exportoptions" id="header">
    <h2>
       <?php echo __('Importing & installing authentication plugin to current server'); ?>
    </h2>
</div>
    <div class="importoptions">
        <h3><?php echo __('Plugin to Import:'); ?></h3>
    
            <div class="formelementrow" id="compression_info">
            Plugin may be Dynamic-link library(dll)or shared object(so).
            <br />
            A plugin file name must take the format of <b>[plugin-name].[extention]</b>. Example: <b> sample_plugin.dll</b>
             <input type="text" name="plugin_na" id="plugin_name" />
            </div>
       
<div class="formelementrow" id="upload_form">
        <?php PMA_browseUploadFile($max_upload_size); ?>
        <br />
</div>
</div>
<div class="importoptions">
        <h3><?php echo __('Plugin:'); ?></h3>
        <div class="formelementrow">
            <label ><?php echo __('Plugin name availble in declaration'); ?></label>
            <input type="text" name="plugin_name" id="plugin_name" />
        </div>
        <div class="formelementrow">
        <label ><?php echo __('Select plugin type'); ?></label>
        <select name="plugin_type" id="plugin_type">
                <option value="dll">Dynamic-link library</option>
                <option value="so">Shared object</option>
        </select>
</div>
</div>
<input type="text" name="fname" />
    <div class="importoptions" id="submit">
        <input type="submit" value="<?php echo __('Go'); ?>" id="buttonGo" multiple="true" />
    </div>
 </form>

