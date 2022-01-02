{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

<h1>画像の登録</h1>

<div>
    {{-- 入力フォーム --}}
    <form action="{{ route('picture.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- ファイル選択欄 --}}
        <input type="file" name="picture">
        {{-- プレビュー表示場所 --}}
        <img src="{{ Storage::url('uploads/no_image.png') }}" id="demo_picture" class="h-48 w-48">
        {{-- 登録ボタン --}}
        <button>登録</button>

    </form>
    {{-- 入力フォームここまで --}}
</div>

<!-- jquery読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{-- プロフィール写真が選択されたらプレビューを表示 --}}
<script>
    $('#new_profile_img').on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $("#demo_picture").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    });
</script>
{{-- プロフィール写真が選択されたらプレビューを表示ここまで --}}


{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
