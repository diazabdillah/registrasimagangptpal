<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use App\Models\Komentar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{

    public function index()
    {

        $ti = 'Chat Admin';
        $forum = Forum::orderBy('created_at', 'desc')->get();
        $countKomentar = DB::table('komentar')
            ->leftJoin('forum', 'forum.id', '=', 'komentar.forum_id')
            ->select('komentar.id', 'komentar.forum_id')
            ->get();
        
        return view('forum.index', [
            'ti' => $ti,
            'forum' => $forum,
            'countKomentar' => $countKomentar,
        ]);
    }
    public function tambah_forum(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        Forum::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'status_user' => Auth::user()->status_user,
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
        ]);
        return redirect()->back()->with('sukses', 'Forum Berhasil ditambahkan');
    }
    public function view_forum($id)
    {

        $ti = 'Forum Diskusi';
        $komentar = Komentar::orderBy('created_at', 'desc')->where('forum_id', '=', $id)->get();
        $forum = Forum::orderBy('created_at', 'desc')->where('id', '=', $id)->get();

        $countKomentar = $komentar->count();
        return view('forum.view', [
            'ti' => $ti,
            'forum' => $forum,
            'komentar' => $komentar,
            'countKomentar' => $countKomentar,
        ]);
    }

    public function edit_forum($id)
    {
        $forum = Forum::find($id);
        $ti = 'Edit forum';
        return view('forum.edit-forum', [
            'ti' => $ti,
            'kontenforum' => $forum
        ]);
    }

    public function proses_edit_forum($id, Request $request)
    {
        Forum::find($id)
            ->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);

        $forum = Forum::find($id);

        session()->flash('succes', 'Komentar Anda berhasil diperbarui');
        return redirect('/forum-view/' . $forum->id);
    }

    public function hapus_forum($id)
    {
        Forum::find($id)
            ->delete();

        Komentar::where('forum_id', '=', $id)
            ->delete();

        session()->flash('succes', 'Komentar Anda berhasil dihapus');
        return redirect('/forum-mhs');
    }

    public function post_komentar(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        Komentar::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'status_user' => Auth::user()->status_user,
            'forum_id' => $request->forum_id,
            'parent' => $request->parent,
            'konten' => $request->konten,
        ]);
        return redirect()->back()->with('success', 'komentar di tambahkan');
    }

    public function edit_komentar($id)
    {
        $komentar = Komentar::find($id);
        $ti = 'Edit komentar';
        return view('forum.edit-komentar', [
            'ti' => $ti,
            'komentar' => $komentar
        ]);
    }

    public function proses_edit_komentar($id, Request $request)
    {
        Komentar::find($id)
            ->update([
                'konten' => $request->konten,
            ]);

        $komentar = Komentar::find($id);

        session()->flash('succes', 'Komentar Anda berhasil diperbarui');
        return redirect('/forum-view/' . $komentar->forum_id);
    }

    public function hapus_komentar($id)
    {
        $komentar = Komentar::find($id);

        Komentar::find($id)
            ->delete();

        session()->flash('succes', 'Komentar Anda berhasil dihapus');
        return redirect('/forum-view/' . $komentar->forum_id);
    }
}