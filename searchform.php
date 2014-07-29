<form action="<?php bloginfo('siteurl'); ?>" class="searchform" method="get">
    <div>
        <label for="s" class="screen-reader-text">Search for:</label>
        <input type="text" class="s" name="s" onblur="if (this.value == '') {this.value = 'Search...';}"
onfocus="if(this.value == 'Search...') {this.value = '';}" value="Search..." />
        
        <input type="submit" value="Search" class="searchsubmit" />
    </div>
</form>