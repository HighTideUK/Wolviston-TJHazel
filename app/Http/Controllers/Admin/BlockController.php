<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Block;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    
    public function getAll()
    {
        $data = [
            'blocks' => Block::orderBy('title')->paginate(25),
            'title' => 'Blocks',
            'active_nav' => [
                'item' => 'blocks',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.blocks.index')->with($data);
    }

    public function getEdit(Block $block)
    {

        $data = [
            'block' => $block,
            'title' => 'Edit Block',
            'action' => route('admin.block.edit_submit', ['block' => $block]),
            'active_nav' => [
                'item' => 'blocks',
                'sub_item' => ''
            ]
        ];

        return view('admin.blocks.edit')->with($data);

    }

    public function postEdit(Block $block, Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required'
        ]);

        $message = 'Block updated successfully';

        $block->title = $request->input('title');
        $block->slug = $request->input('slug');
        $block->content = $request->input('content');
        $block->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'block' => new Block,
            'title' => 'New Block',
            'action' => route('admin.block.new_submit'),
            'active_nav' => [
                'item' => 'blocks',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.blocks.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required'
        ]);

        $message = 'New block created successfully';

        $block = new Block;
        $block->title = $request->input('title');
        $block->slug = $request->input('slug');
        $block->content = $request->input('content');
        $block->save();

        return redirect()->route('admin.blocks')->with('success', $message);

    }

    public function getDelete(Block $block)
    {

        $message = 'Block <strong>'.$block.'</strong> deleted successfully';
        $block->delete();

        return redirect()->route('admin.blocks')->with('success', $message);

    }

}
