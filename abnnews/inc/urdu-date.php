<?php
class WP_UrduDate {

    public function __construct() {
        add_filter( 'the_time', array( $this, 'translate' ) );
        add_filter( 'the_date', array( $this, 'translate' ) );

        add_filter( 'get_the_date', array( $this, 'translate' ) );
        add_filter( 'get_the_time', array( $this, 'translate' ) );
        add_filter( 'date_i18n', array( $this, 'translate' ) );

        add_filter( 'comments_number', array( $this, 'translate' ) );

        add_filter( 'get_comment_date', array( $this, 'translate' ) );
        add_filter( 'get_comment_time', array( $this, 'translate' ) );

        add_filter( 'number_format_i18n', array( $this, 'translate' ) );
    }

    /**
     * Main function that handles the string
     *
     * @param string $str
     * @return string
     */
    function translate( $str ) {
        if ( !$str ) {
            return;
        }

        $str = $this->translate_number( $str );
        $str = $this->translate_day( $str );
        $str = $this->translate_am( $str );

        return $str;
    }

    /**
     * Translate numbers only
     *
     * @param string $str
     * @return string
     */
    function translate_number( $str ) {
        $en = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 );
        $bn = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);

        $str = str_replace( $en, $bn, $str );

        return $str;
    }

    /**
     * Translate months only
     *
     * @param string $str
     * @return string
     */
    function translate_day( $str ) {
        $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
        $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $bn = array( "جنوری "," فروری "," مارچ "," اپریل "," مئی "," جون "," جولائ "," اگست "," ستمبر "," اکتوبر "," نومبر "," دسمبر " );

        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn, $str );

        return $str;
    }

    /**
     * Translate AM and PM
     *
     * @param string $str
     * @return string
     */
    function translate_am( $str ) {
        $en = array( 'am', 'pm' );
        $bn = array( 'am', 'pm' );

        $str = str_replace( $en, $bn, $str );

        return $str;
    }
}

$bn = new WP_UrduDate();