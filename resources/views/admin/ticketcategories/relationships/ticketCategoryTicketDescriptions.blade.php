@can('ticket_description_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ticket-descriptions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ticketDescription.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.ticketDescription.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ticketCategoryTicketDescriptions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ticketDescription.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticketDescription.fields.ticket_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticketDescription.fields.supporting_files') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticketDescription.fields.supporting_photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticketDescription.fields.ticket_title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ticketDescriptions as $key => $ticketDescription)
                        <tr data-entry-id="{{ $ticketDescription->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ticketDescription->id ?? '' }}
                            </td>
                            <td>
                                {{ $ticketDescription->ticket_category->category_description ?? '' }}
                            </td>
                            <td>
                                @foreach($ticketDescription->supporting_files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($ticketDescription->supporting_photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $ticketDescription->ticket_title ?? '' }}
                            </td>
                            <td>
                                @can('ticket_description_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ticket-descriptions.show', $ticketDescription->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ticket_description_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ticket-descriptions.edit', $ticketDescription->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ticket_description_delete')
                                    <form action="{{ route('admin.ticket-descriptions.destroy', $ticketDescription->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ticket_description_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ticket-descriptions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ticketCategoryTicketDescriptions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection