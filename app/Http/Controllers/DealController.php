<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::all();
        return view('Dashboard.Deal', compact('deals'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Dashboard.createDeal', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirement' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'nullable|mimetypes:video/mp4,video/ogg,video/webm|max:20480',
            'youtube_link' => 'nullable|url',
            'price' => 'required|numeric',
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date'
        ],
        [
            'category_id.required' => 'حقل فئة الصفقة مطلوب.',
            'category_id.exists' => 'فئة الصفقة المحددة غير صالحة.',
            'name.required' => 'حقل اسم الصفقة مطلوب.',
            'name.string' => 'حقل اسم الصفقة يجب أن يكون نصياً.',
            'name.max' => 'حقل اسم الصفقة يجب أن لا يتجاوز 255 حرفاً.',
            'description.string' => 'حقل وصف الصفقة يجب أن يكون نصياً.',
            'image.image' => 'حقل الصورة يجب أن يكون صورة.',
            'image.mimes' => 'حقل الصورة يجب أن يكون بصيغة jpeg أو png أو jpg أو gif أو svg.',
            'image.max' => 'حجم ملف الصورة يجب أن لا يتجاوز 2048 كيلوبايت.',
            'video.mimetypes' => 'حقل الفيديو يجب أن يكون بصيغة mp4 أو ogg أو webm.',
            'video.max' => 'حجم ملف الفيديو يجب أن لا يتجاوز 20480 كيلوبايت.',
            'youtube_link.url' => 'حقل رابط اليوتيوب يجب أن يكون عنوان URL صالح.',
            'price.required' => 'حقل سعر الصفقة مطلوب.',
            'price.numeric' => 'حقل سعر الصفقة يجب أن يكون رقماً.',
            'start_date.required' => 'حقل تاريخ بدء الصفقة مطلوب.',
            'start_date.date' => 'حقل تاريخ بدء الصفقة يجب أن يكون تاريخاً.',
            'start_date.after' => 'تاريخ بدء الصفقة يجب أن يكون بعد تاريخ اليوم.',
            'end_date.required' =>  'حقل تاريخ بدء الصفقة مطلوب.',
        
        
                ]
    );
    
        $deal = new Deal();
        $deal->category_id = $validatedData['category_id'];
        $deal->name = $validatedData['name'];
        $deal->description = $validatedData['description'];
        $deal->price = $validatedData['price'];
        $deal->start_date = $validatedData['start_date'];
        $deal->end_date = $validatedData['end_date'];
        $deal->requirement = $validatedData['requirement'];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/deals', $filename);
            $deal->image = $filename;
        }
    
        // Handle video upload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '_' . Str::slug($video->getClientOriginalName()) . '.' . $video->getClientOriginalExtension();
            $path = $video->storeAs('public/deals', $filename);
            $deal->video = $filename;
        }
    
        $deal->youtube_link = $validatedData['youtube_link'];
    
        $deal->save();
    
        return redirect()->route('deal.index')->with('success', 'تم حفظ الصفقةبنجاح.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        $categories = Category::all();
        return view('Dashboard.editeDeal', compact('deal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirement' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'nullable|mimetypes:video/mp4,video/ogg,video/webm|max:20480',
            'youtube_link' => 'nullable|url',
            'price' => 'required|numeric',
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date'
        ],
        [
            'category_id.required' => 'حقل فئة الصفقة مطلوب.',
            'category_id.exists' => 'فئة الصفقة المحددة غير صالحة.',
            'name.required' => 'حقل اسم الصفقة مطلوب.',
            'name.string' => 'حقل اسم الصفقة يجب أن يكون نصياً.',
            'name.max' => 'حقل اسم الصفقة يجب أن لا يتجاوز 255 حرفاً.',
            'description.string' => 'حقل وصف الصفقة يجب أن يكون نصياً.',
            'image.image' => 'حقل الصورة يجب أن يكون صورة.',
            'image.mimes' => 'حقل الصورة يجب أن يكون بصيغة jpeg أو png أو jpg أو gif أو svg.',
            'image.max' => 'حجم ملف الصورة يجب أن لا يتجاوز 2048 كيلوبايت.',
            'video.mimetypes' => 'حقل الفيديو يجب أن يكون بصيغة mp4 أو ogg أو webm.',
            'video.max' => 'حجم ملف الفيديو يجب أن لا يتجاوز 20480 كيلوبايت.',
            'youtube_link.url' => 'حقل رابط اليوتيوب يجب أن يكون عنوان URL صالح.',
            'price.required' => 'حقل سعر الصفقة مطلوب.',
            'price.numeric' => 'حقل سعر الصفقة يجب أن يكون رقماً.',
            'start_date.required' => 'حقل تاريخ بدء الصفقة مطلوب.',
            'start_date.date' => 'حقل تاريخ بدء الصفقة يجب أن يكون تاريخاً.',
            'start_date.after' => 'تاريخ بدء الصفقة يجب أن يكون بعد تاريخ اليوم.',
            'end_date.required' =>  'حقل تاريخ بدء الصفقة مطلوب.',
        
        
                ]
    );
    
        
        $deal->category_id = $validatedData['category_id'];
        $deal->name = $validatedData['name'];
        $deal->description = $validatedData['description'];
        $deal->price = $validatedData['price'];
        $deal->start_date = $validatedData['start_date'];
        $deal->end_date = $validatedData['end_date'];
        $deal->requirement = $validatedData['requirement'];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/deals', $filename);
            $deal->image = $filename;
        }
    
        // Handle video upload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '_' . Str::slug($video->getClientOriginalName()) . '.' . $video->getClientOriginalExtension();
            $path = $video->storeAs('public/deals', $filename);
            $deal->video = $filename;
        }
    
        $deal->youtube_link = $validatedData['youtube_link'];
    
        $deal->save();
    
        return redirect()->route('deal.index')->with('success', 'تم تعديل الصفقة بنجاح.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return redirect()->route('deal.index');
    }
}
