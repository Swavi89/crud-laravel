@if($records->firstItem())
    <div class="box-footer clearfix">
        <div class="row">
            <div class="col-sm-4">
                <div>Showing {{ $records->firstItem() }} to {{ $records->lastItem() }} of {{ $records->total() }} Entries</div>
            </div>
            <div class="col-sm-8">
                {{  $records->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endif
