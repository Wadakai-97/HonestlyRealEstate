@extends('layouts.user')
@section('title', 'スタッフ個別紹介')
@section('body')
<a href="{{ route('hre') }}">TOPページ</a> > <a href="{{ route('staff') }}">スタッフ一覧</a>

<h3 class="part_title">{{ $staff->staff_name }}</h3>
<img src="" alt="プロフィール画像" onerror="this.onerror=null;this.src='{{ asset('/storage/head_shots/no_image.jpg') }}'">
<li>役職：{{ $staff->position }}</li>
<li>契約数：{{ number_format($staff->number_of_contracts) }}件</li>
<li>趣味：{{ $staff->hobby }}</li>
<li class="documents">コメント：{{ $staff->comment }}</li>

<h4 class="part_title">ブログ記事</h4>
@foreach($articles as $article)
<li>{{ $article->title }}</li>
@endforeach

<h4 class="part_title">お客様評価</h4>
@foreach($reviews as $review)
<li>{{ $review->name }}様からの評価は「{{ $review->review}}/5」です。</li>
<li>コメント「{{ $review->comment }}」</li>
<li>投稿日：{{ $review->created_at->format('Y年m月d日') }}</li><br>
@endforeach

@endsection
