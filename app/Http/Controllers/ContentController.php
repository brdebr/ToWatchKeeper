<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        $response = array(
            'status' => 'OK',
            'message' => 'Here is a list of all the contents !',
            'data' => $contents,
        );
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Content::create(json_decode($request->getContent(), true));
        $response = array(
            'status' => 'OK',
            'message' => 'Here is the content you created !',
            'data' => $content,
        );
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        $response = array(
            'status' => 'OK',
            'message' => 'Here is the content you wanted !',
            'data' => $content,
        );
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contentOld = Content::find($id);
        $result = Content::find($id)->update((json_decode($request->getContent(), true)));
        $contentNew = Content::find($id);
        // TODO: Catch errors
        $response = array(
            'status' => 'OK',
            'message' => 'Here is your updated content!',
            'data' => array(
               'old' => $contentOld,
               'new' => $contentNew,
            )
        );
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $result = Content::find($id)->delete();
        if($result){
            $response = array(
                'status' => 'OK',
                'message' => 'Here is the content that you deleted!',
                'data' => $content
            );
        }else{
            $response = array(
                'status' => 'ERROR',
                'message' => $result,
            );
        }
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }
}
