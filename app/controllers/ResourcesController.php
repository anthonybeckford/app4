<?php

class ResourcesController extends \BaseController {




    public function getIndex()
    {
        if ( \Auth::check() && \Auth::user()->hasPaid() )
        {
            $resources = \Resource::all();
            return \View::make('resources.index')->with([
                'resources' => $resources
            ]);

        } else {

            \App::abort(404);
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
		    if ( \Auth::check() && \Auth::user()->hasPaid() )
            {
                $resource = \Resource::find($id);
                $path_to_image = app('path.protected_images') .'/'.$resource->image;
                //Read image path, convert to base64 encoding
                $imgData = base64_encode(file_get_contents($path_to_image));
                //Format the image SRC:  data:{mime};base64,{data};
                $src = 'data: '.mime_content_type($path_to_image).';base64,'.$imgData;

                return \View::make('resources.view')->with([
                    'resource' => $resource,
                    'img' => $src
                ]);

            } else {

                \App::abort(404);
            }

        } catch (\Exception $e) {

            \Log::warning( $e->getMessage() );
        }
	}






}
