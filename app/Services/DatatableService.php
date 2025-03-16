<?php
// service untuk menampilkan data ke dalam data table
namespace App\Services;

use Yajra\DataTables\Facades\DataTables;

class DatatableService
{
    public function render($request, $dataOfArray, $routingGlobal, $routingDelete, $routingEdit,$routingDetail, $view)
    {
        if ($request->ajax()) {
            return DataTables::of($dataOfArray)
                ->addIndexColumn()
                ->addColumn('action', function($row) use ($routingGlobal, $routingDelete, $routingEdit, $routingDetail) {

                    $btn = '';
                    if ($routingDetail !== "null") {
                        $detailUrl = route($routingDetail, [$routingGlobal => $row['id']]);
                        $btn .= '<a href="'.$detailUrl."/".'" class="btn btn-success btn-sm">Detail</a> ';
                    }
                    if ($routingEdit !== "null") {
                        $editUrl = route($routingEdit, [$routingGlobal => $row['id']]);
                        $btn .= '<a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>';
                    }
                    if ($routingDelete !== "null") {
                        $deleteUrl = route($routingDelete, [$routingGlobal => $row['id']]);
                        $btn .= ' <button class="btn btn-danger btn-sm" onclick="deleteConfirmation(\'' . $row['id'] . '\')">Delete</button>';

                        $btn .= '<form id="delete-form-'.$row['id'].'" action="'.$deleteUrl.'" method="POST" style="display: none;">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                 </form>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($view, compact('dataOfArray'));
    }

    // public function renderCashier($request, $dataOfArray, $routingGlobal, $routingDelete, $routingEdit,$routingDetail, $view)
    // {
    //     if ($request->ajax()) {
    //         return DataTables::of($dataOfArray)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row) use ($routingGlobal, $routingDelete, $routingEdit, $routingDetail) {
    //                 $deleteUrl = route($routingDelete, [$routingGlobal => $row['id']]);
    //                 $editUrl = route($routingEdit, [$routingGlobal => $row['id']]);

    //                 $btn = '';
    //                 if ($routingDetail !== "null") {
    //                     $detailUrl = route($routingDetail, [$routingGlobal => $row['id']]);
    //                     $btn .= '<a href="'.$detailUrl."/".'" class="btn btn-success btn-sm">Detail</a> ';
    //                 }

    //                 $btn .= '<a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>';
    //                 $btn .= ' <button class="btn btn-danger btn-sm" onclick="deleteConfirmation('.$row['id'].')">Delete</button>';
    //                 $btn .= '<form id="delete-form-'.$row['id'].'" action="'.$deleteUrl.'" method="POST" style="display: none;">
    //                             '.csrf_field().'
    //                             '.method_field('DELETE').'
    //                          </form>';

    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view($view, compact('dataOfArray'));
    // }

}
