<?php

    /*
     *      OSCLass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2010 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    /**
    * Helper Location
    * @package OSClass
    * @subpackage Helpers
    * @author OSClass
    */

    function osc_country() {
        if (View::newInstance()->_exists('countries')) {
            return View::newInstance()->_current('countries') ;
        } else {
            return null;
        }
    }

    function osc_region() {
        if (View::newInstance()->_exists('regions')) {
            return View::newInstance()->_current('regions') ;
        } else {
            return null;
        }
    }

    function osc_city() {
        if (View::newInstance()->_exists('cities')) {
            return View::newInstance()->_current('cities') ;
        } else {
            return null;
        }
    }
    
    function osc_city_area() {
        if (View::newInstance()->_exists('city_areas')) {
            return View::newInstance()->_current('city_areas') ;
        } else {
            return null;
        }
    }
    
    function osc_has_countries() {
        if ( !View::newInstance()->_exists('countries') ) {
            View::newInstance()->_exportVariableToView('countries', Search::newInstance()->listCountries( ">=", "country_name ASC") ) ;
        }
        return View::newInstance()->_next('countries') ;
    }

    function osc_has_regions($country = '%%%%') {
        if ( !View::newInstance()->_exists('regions') ) {
            View::newInstance()->_exportVariableToView('regions', Search::newInstance()->listRegions($country, ">=", "region_name ASC" ) ) ;
        }
        return View::newInstance()->_next('regions') ;
    }

    function osc_has_cities($region = '%%%%') {
        if ( !View::newInstance()->_exists('cities') ) {
            View::newInstance()->_exportVariableToView('cities', Search::newInstance()->listCities($region, ">=", "city_name ASC" ) ) ;
        }
        $result = View::newInstance()->_next('cities');

        if (!$result) View::newInstance()->_erase('cities') ;
        return $result;
    }

    function osc_has_city_areas($city = '%%%%') {
        if ( !View::newInstance()->_exists('city_areas') ) {
            View::newInstance()->_exportVariableToView('city_areas', Search::newInstance()->listCityAreas($region, ">=", "city_area_name ASC" ) ) ;
        }
        $result = View::newInstance()->_next('city_areas');

        if (!$result) View::newInstance()->_erase('city_areas') ;
        return $result;
    }

    function osc_count_countries() {
        if ( !View::newInstance()->_exists('contries') ) {
            View::newInstance()->_exportVariableToView('countries', Search::newInstance()->listCountries( ">=", "country_name ASC" ) ) ;
        }
        return View::newInstance()->_count('countries') ;
    }

    function osc_count_regions($country = '%%%%') {
        if ( !View::newInstance()->_exists('regions') ) {
            View::newInstance()->_exportVariableToView('regions', Search::newInstance()->listRegions($country,  ">=", "region_name ASC" ) ) ;
        }
        return View::newInstance()->_count('regions') ;
    }

    function osc_count_cities($region = '%%%%') {
        if ( !View::newInstance()->_exists('cities') ) {
            View::newInstance()->_exportVariableToView('cities', Search::newInstance()->listCities($region, ">=", "city_name ASC" ) ) ;
        }
        return View::newInstance()->_count('cities') ;
    }

    function osc_count_city_areas($city = '%%%%') {
        if ( !View::newInstance()->_exists('city_areas') ) {
            View::newInstance()->_exportVariableToView('city_areas', Search::newInstance()->listCityAreas($region, ">=", "city_area_name ASC" ) ) ;
        }
        return View::newInstance()->_count('city_areas') ;
    }

    function osc_country_name() {
        return osc_field(osc_country(), 'country_name', '') ;
    }
    
    function osc_country_items() {
        return osc_field(osc_country(), 'items', '') ;
    }

    function osc_region_name() {
        return osc_field(osc_region(), 'region_name', '') ;
    }
    
    function osc_region_items() {
        return osc_field(osc_region(), 'items', '') ;
    }

    function osc_city_name() {
        return osc_field(osc_city(), 'city_name', '') ;
    }

    function osc_city_items() {
        return osc_field(osc_city(), 'items', '') ;
    }

    function osc_city_area_name() {
        return osc_field(osc_city_area(), 'city_area_name', '') ;
    }

    function osc_city_area_items() {
        return osc_field(osc_city_area(), 'items', '') ;
    }

    function osc_country_url() {
        return osc_search_url(array('sCountry' => osc_country_name()));
    }

    function osc_region_url() {
        return osc_search_url(array('sRegion' => osc_region_name()));
    }

    function osc_city_url() {
        return osc_search_url(array('sCity' => osc_city_name()));
    }

    function osc_city_area_url() {
        return osc_search_url(array('sCityArea' => osc_city_area_name()));
    }

?>
