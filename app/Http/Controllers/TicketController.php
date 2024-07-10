<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\TicketEmployees;
use App\TicketDivisions;
use App\TicketSections;
use App\TicketReferenceCode;
use App\TicketStatus;
use App\Holdings;
use Session;


class TicketController extends Controller
{


    public function quickView(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('*');

        return response()->json($data, 200);
    }

    // ===============================================================================

    public function loadHoldings_All(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Title2', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.CallNum', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.SeriesTitle', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.JournalTitle', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Author', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Subject', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Title(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Author(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Subject(Request $a, $keyword){
            $data = DB::table('tblHoldings')
                        ->orderBy('tblHoldings.Title')
                        ->groupBy('tblHoldings.HoldingsID')
                        ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_CallNum(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_All(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.Title','!=', '')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Title(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Author(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Subject(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_CallNum(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    // ===============================================================================

    public function loadHoldings_All_keyword(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.Title','!=', '')
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Title2', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.CallNum', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.SeriesTitle', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.JournalTitle', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Author', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Subject', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Title_keyword(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Title2', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Author_keyword(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                    ->where('tblHoldingsAuthorName.AuthorName', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldingsAuthorName.CorporateAuthor', 'LIKE', "%$keyword%")
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Subject_keyword(Request $a, $keyword){
        // $data = DB::table('tblHoldings')
        //             ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
        //             ->where('tblHoldingsSubject.SubjectHeadings', 'LIKE', "%$keyword%")
        //             ->orWhere('tblHoldingsSubject.FormSubdivision', 'LIKE', "%$keyword%")
        //             ->orWhere('tblHoldingsSubject.SubjectSubdivision', 'LIKE', "%$keyword%")
        //             ->orWhere('tblHoldingsSubject.SubjectChronology', 'LIKE', "%$keyword%")
        //             ->orWhere('tblHoldingsSubject.HeadingGeography', 'LIKE', "%$keyword%")
        //             ->orderBy('tblHoldings.Title')
        //             ->groupBy('tblHoldings.HoldingsID')
        //             ->paginate($a->perpage);
            $data = DB::table('tblHoldings')
                        ->where('tblHoldings.Subject', 'LIKE', "%$keyword%")
                        ->orderBy('tblHoldings.Title')
                        ->groupBy('tblHoldings.HoldingsID')
                        ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_CallNum_keyword(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.CallNum', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_All_keyword(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    // ->orWhere('tblHoldingsAuthorName.AuthorName', 'LIKE', "%$keyword%")
                    // ->orWhere('tblHoldingsSubject.SubjectHeadings', 'LIKE', "%$keyword%")
                    // ->orWhere('tblHoldings.CallNum', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Title_keyword(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Author_keyword(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->where('tblHoldings.Author', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_Subject_keyword(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->where('tblHoldings.Subject', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_Type_CallNum_keyword(Request $a, $materialType, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.MaterialType', $materialType)
                    ->where('tblHoldings.CallNum', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    // ===============================================================================





    public function loadHoldings_SubjectOnly(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->where('tblHoldings.Subject', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadHoldings_keyword(Request $a, $keyword){
        $data = DB::table('tblHoldings')
                    ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
                    ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldings.Title2', 'LIKE', "%$keyword%")
                    ->orWhere('tblHoldingsSubject.SubjectHeadings', 'LIKE', "%$keyword%")
                    ->orderBy('tblHoldings.Title')
                    ->groupBy('tblHoldings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }
    // public function loadHoldings_keyword(Request $a, $keyword){
    //     $data = DB::table('tblHoldings')
    //                 ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
    //                 ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
    //                 ->join('tblHoldingsPublisherName', 'tblHoldings.HoldingsID','=', 'tblHoldingsPublisherName.HoldingsID')
    //                 ->where('tblHoldings.Title', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldings.Title2', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldings.SummaryAbstracts', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsAuthorName.AuthorName', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsAuthorName.CorporateAuthor', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsSubject.SubjectHeadings', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsSubject.FormSubdivision', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsSubject.SubjectSubdivision', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsSubject.SubjectChronology', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsSubject.HeadingGeography', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsPublisherName.PublisherName', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsPublisherName.PublicationPlace', 'LIKE', "%$keyword%")
    //                 ->orWhere('tblHoldingsPublisherName.PublicationDate', 'LIKE', "%$keyword%")
    //                 ->orderBy('tblHoldings.Title')
    //                 ->orderBy('tblHoldingsAuthorName.AuthorName')
    //                 ->orderBy('tblHoldingsAuthorName.CorporateAuthor')
    //                 ->orderBy('tblHoldingsSubject.SubjectHeadings')
    //                 ->orderBy('tblHoldingsPublisherName.PublisherName')
    //                 ->orderBy('tblHoldings.MaterialType')
    //                 ->groupBy('tblHoldings.HoldingsID')
    //                 // ->get('*');
    //                 ->paginate($a->perpage);
    //     return response()->json($data, 200);
    // }

    
    public function loadKeyword_Holdings(Request $a, $keyword){
        $data = DB::table('tblholdings')
                    ->where('tblholdings.Title', 'LIKE', "%$keyword%")
                    ->orWhere('tblholdings.Title2', 'LIKE', "%$keyword%")
                    ->orderBy('tblholdings.Title')
                    ->groupBy('tblholdings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadKeyword_Author(Request $a, $keyword){
        $data = DB::table('tblholdings')
                    ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                    ->where('tblholdingsauthorname.AuthorName', 'LIKE', "%$keyword%")
                    ->orWhere('tblholdingsauthorname.CorporateAuthor', 'LIKE', "%$keyword%")
                    ->orWhere('tblholdingssubject.SubjectHeadings', 'LIKE', "%$keyword%")
                    ->orderBy('tblholdings.Title')
                    ->groupBy('tblholdings.HoldingsID')
                    ->paginate($a->perpage);
        return response()->json($data, 200);
    }

    public function loadKeyword_Subject(Request $request, $keyword){
        $data = DB::table('tblholdings')
                ->join('tblholdingsauthorname', 'tblholdings.HoldingsID','=', 'tblholdingsauthorname.HoldingsID')
                ->join('tblholdingssubject', 'tblholdings.HoldingsID','=', 'tblholdingssubject.HoldingsID')
                ->join('tblholdingspublishername', 'tblholdings.HoldingsID','=', 'tblholdingspublishername.HoldingsID')
                ->where('tblholdingssubject.SubjectHeadings', 'LIKE', "%$keyword%")
                ->get('*');
        
        return response()->json($data, 200);
    }

    public function loadHoldings_Details(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
                ->join('tblHoldingsPublisherName', 'tblHoldings.HoldingsID','=', 'tblHoldingsPublisherName.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('*');
        
        return response()->json($data, 200);
    }

    public function loadHoldingsDetails_MaterialType(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('tblHoldings.MaterialType');
        
        return response()->json($data, 200);
    }

    public function loadHoldingsDetails_Articles(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('*');
        
        return response()->json($data, 200);
    }

    public function loadHoldingsDetails_Articles_HoldingsOnly(Request $request, $id){
        $data = DB::table('tblHoldings')
                // ->join('tblHoldingsPublisherName', 'tblHoldings.HoldingsID','=', 'tblHoldingsPublisherName.HoldingsID')
                // ->join('tblholdingspublishername', 'tblHoldings.HoldingsID','=', 'tblholdingspublishername.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('*');
        
        return response()->json($data, 200);
    }

    public function loadHoldingsDetails_Publisher(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsPublisherName', 'tblHoldings.HoldingsID','=', 'tblHoldingsPublisherName.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->get('*');
        
        return response()->json($data, 200);
    }


    public function loadHoldings_MainAuthor(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->where('tblHoldingsAuthorName.MAuthor', 1)
                ->get('tblHoldingsAuthorName.AuthorName');
        return response()->json($data, 200);
    }

    public function loadHoldingsCopy(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsCopy', 'tblHoldings.HoldingsID','=', 'tblHoldingsCopy.HoldingsID')
                ->where('tblHoldingsCopy.HoldingsID', $id)
                ->get('tblHoldingsCopy.Location');
        return response()->json($data, 200);
    }

    public function loadHoldings_SubAuthor(Request $request, $id){
        $data = DB::table('tblHoldings')
                ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                ->where('tblHoldings.HoldingsID', $id)
                ->where('tblHoldingsAuthorName.MAuthor', 0)
                ->get('tblHoldingsAuthorName.AuthorName');
        return response()->json($data, 200);
    }

    public function ifHas_Author($id){
        $data = DB::table('tblHoldingsAuthorName')
                ->where('tblHoldingsAuthorName.HoldingsID', $id)
                ->count();
        return response()->json($data, 200);
    }

    public function ifHas_Publisher($id){
        $data = DB::table('tblHoldingsPublisherName')
                ->where('tblHoldingsPublisherName.HoldingsID', $id)
                ->count();
        return response()->json($data, 200);
    }

    public function ifHas_Subject($id){
        $data = DB::table('tblHoldingsSubject')
                ->where('tblHoldingsSubject.HoldingsID', $id)
                ->count();
        return response()->json($data, 200);
    }

    public function ifHas_File($id){
        $data = DB::table('tblMultimedia')
                ->where('tblMultimedia.HoldingsID', $id)
                ->count();
        return response()->json($data, 200);
    }

    public function quickView_Multimedia(Request $request, $id){
        $data = DB::table('tblMultimedia')
                // ->join('tblHoldingsAuthorName', 'tblHoldings.HoldingsID','=', 'tblHoldingsAuthorName.HoldingsID')
                // ->join('tblHoldingsSubject', 'tblHoldings.HoldingsID','=', 'tblHoldingsSubject.HoldingsID')
                // ->join('tblHoldingsPublisherName', 'tblHoldings.HoldingsID','=', 'tblHoldingsPublisherName.HoldingsID')
                ->where('tblMultimedia.HoldingsID', $id)
                ->get('*');

        return response()->json($data, 200);
    }




    // public function countEntry($date){
    //     $data = TicketStatus::where('ticket_statuses.entry_date', $date)
    //                         ->count();

    //     return response()->json($data, 200);
    // }


    public function myPaginateStdClass($query, $paginate = 10, $options = ["path" => "/contents/search"]) {
        $page = $_GET['page'] ?? 1;
        $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = array_slice($query, $offSet, $paginate, true);
        return new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($query), $paginate, $page,$options);

    }
}


// SELECT r.id content_id,
//     r.Contents, 
//     r.MaterialType, 
//     r.HoldingsID, 
//     r.title, 
//     r.generalnote, 
//     r.abstracts, 
//     r.broadclass, 
//     r.Type,
//    	(soundex(r.Title) like CONCAT(TRIM(TRAILING '0' FROM SOUNDEX(kw)),'%')) as sxTitle,
//     (soundex(r.Abstracts) like CONCAT(TRIM(TRAILING '0' FROM SOUNDEX(kw)),'%')) as sxAbs,
//     (MATCH(r.Title) AGAINST(kw IN NATURAL LANGUAGE MODE)) as ftTitle
//     from tblrecord as r
//     WHERE 
//     MATCH(r.Title) AGAINST(kw IN NATURAL LANGUAGE MODE) or
//     MATCH(r.Abstracts) AGAINST(kw IN NATURAL LANGUAGE MODE) or 
//     soundex(r.Title) like CONCAT(TRIM(TRAILING '0' FROM SOUNDEX(kw)),'%') = 1
//     or soundex(r.Abstracts) like CONCAT(TRIM(TRAILING '0' FROM SOUNDEX(kw)),'%') = 1
//     ORDER BY ftTitle DESC