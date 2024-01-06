public function index()
{
    $pages = Page::all();
    return view('pages.index', compact('pages'));
}

public function create()
{
    return view('pages.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Page::create($validatedData);

    return redirect()->route('pages.index');
}

// Similar methods for show, edit, update, and destroy
