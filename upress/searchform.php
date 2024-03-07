<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'جو تلاش کرنا چاہ رہے ہیں یہاں لکھیں', 'label' ) ?></span>
		<input type="search" id="searchInput" class="search-field" wrap="soft" onKeyPress="processKeypresses()" onClick="storeCaret(this)" onKeyUp="storeCaret(this)" onkeydown="processKeydown()" onFocus="setEditor(this)" placeholder="<?php echo esc_attr_x( 'جو تلاش کرنا چاہ رہے ہیں یہاں لکھیں …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'جو تلاش کرنا چاہ رہے ہیں یہاں لکھیں', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'تلاش کریں', 'submit button' ) ?>" />
</form>