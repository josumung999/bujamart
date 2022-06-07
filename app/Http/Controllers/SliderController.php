<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function sliders() {
        $sliders = Slider::All();

        return view('admin.sliders')->with('sliders', $sliders);
    }

    public function add_slider() {
        return view('admin.addslider');
    }

    public function saveslider(Request $request) {
        $this->validate($request, [
            'slider_title' => 'required',
            'slider_description' => 'required',
            'slider_link' => 'required|active_url',
            'slider_image' => 'image|required|max:2999'
        ]);

        // 1 :get file name with extension
        $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
        // 2 : get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // 3 : get just file extension
        $extension = $request->file('slider_image')->getClientOriginalExtension();
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // upload image
        $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

        $slider = new Slider();

        $slider->slider_title = $request->input('slider_title');
        $slider->slider_description = $request->input('slider_description');
        $slider->slider_link = $request->input('slider_link');
        $slider->slider_image = $fileNameToStore;

        $slider->save();

        return back()->with('status', 'Le Slider a été créé avec succès');
    }

    public function edit_slider() {
        return view('admin.edit_slider');
    }

    public function updateslider($id) {

        
    }
}
