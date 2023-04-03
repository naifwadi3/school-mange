<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('Parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Teacher_trans.Email') }}</th>
            <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
            <th>{{ trans('Teacher_trans.specialization') }}</th>
            <th>{{ trans('Teacher_trans.Gender') }}</th>
            <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($teachers as $teacher)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $teacher->Email }}</td>
                <td>{{ $teacher->Name }}</td>
                <td>{{ $teacher->specializations->Name }}</td>
                <td>{{ $teacher->genders->Name }}</td>
                <td>{{ $teacher->Joining_Date }}</td>
                <td>
                    {{-- <button wire:click="edit({{ $teachers->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $teachers->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button> --}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
