<?php
namespace App\Http\Controllers;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tmap;

/*
|--------------------------------------------------------------------------
@author: FarhanWazir - Adapted gvargas 
@date: 7/23/2018
@description: Updated fot testing 
|--------------------------------------------------------------------------
*/

class MapController extends Controller
{
    protected $gmap;
    public function __construct(GMaps $gmap){
        $this->gmap = $gmap;
    }
    public function index(){

        $config = array();
        $config['map_height'] = "100%";
        $config['center'] = '1975 NE 135th St Miami, Florida';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
        $this->gmap->initialize($config); // Initialize Map with custom configuration
        // set up the marker ready for positioning
        $marker = array();
        $marker['draggable'] = true;
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';

        //Read from database points to show in the map
        $points = Tmap::all()->toArray();
    	
       
        foreach ($points as $value){
        
			$marker['position'] = $value['address'];
			$marker['infowindow_content'] = $value['name'];
			$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
	    	$this->gmap->add_marker($marker);
	    }
    	$map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']
        return view('map', ['map' => $map]);
    }

}