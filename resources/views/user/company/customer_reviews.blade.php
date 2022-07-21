@extends('layouts.user')
@section('title', 'お客様の声')
@section('body')
<h3  class="part_title">お客様の声</h3>
@foreach($reviews as $review)
<table>
    <tr>
        <td><a href="{{ route('staff.detail', ['id' => $review->staff->id]) }}">担当スタッフ「{{ $review->staff->staff_name }}」</a></td><td>総合評価：{{ $review->review }}/５</td>
    </tr>
    <tr>
        <td colspan=2>コメント：{{ $review->comment }}</td>
    </tr>
    <tr>
        <td colspan=2>投稿日： {{ $review->created_at->diffForHumans() }}</td>
    </tr>
</table><br>
@endforeach

{{ $reviews->links('pagination::default') }}
@endsection
