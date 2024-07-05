import { http, httpFile } from './http_service';




export function quickView(id){
    return httpFile().post(`/quickView/${id}`);
}

//////////////////////////////////////////////////////////////////////////
// Without Keyword
//////////////////////////////////////////////////////////////////////////

export function loadHoldings_All(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_All/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Title(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Title/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Author(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Author/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Subject(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Subject/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_CallNum(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_CallNum/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_SubjectOnly(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_SubjectOnly/${keyword}?page=${currentPage}&perpage=${perpage}`);
}


export function loadHoldings_Type_All(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_All/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Title(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Title/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Author(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Author/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Subject(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Subject/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_CallNum(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_CallNum/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

//////////////////////////////////////////////////////////////////////////
// With Keyword
//////////////////////////////////////////////////////////////////////////

export function loadHoldings_All_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_All_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Title_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Title_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Author_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Author_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_Subject_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Subject_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_CallNum_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_CallNum_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_keyword_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_keyword_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

export function loadHoldings_SubjectOnly_keyword(keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_SubjectOnly_keyword/${keyword}?page=${currentPage}&perpage=${perpage}`);
}


export function loadHoldings_Type_All_keyword(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_All_keyword/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Title_keyword(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Title_keyword/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Author_keyword(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Author_keyword/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_Subject_keyword(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_Subject_keyword/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}
export function loadHoldings_Type_CallNum_keyword(materialType, keyword, currentPage, perpage){
    return httpFile().post(`/loadHoldings_Type_CallNum_keyword/${materialType}/${keyword}?page=${currentPage}&perpage=${perpage}`);
}

//////////////////////////////////////////////////////////////////////////



export function loadKeyword_Holdings(keyword){
    return httpFile().post(`/loadKeyword_Holdings/${keyword}`);
}

export function loadKeyword_Author(keyword){
    return httpFile().post(`/loadKeyword_Author/${keyword}`);
}

export function loadKeyword_Subject(keyword){
    return httpFile().post(`/loadKeyword_Subject/${keyword}`);
}

export function loadHoldings_Details(id){
    return httpFile().post(`/loadHoldings_Details/${id}`);
}

export function loadHoldingsDetails_MaterialType(id){
    return httpFile().post(`/loadHoldingsDetails_MaterialType/${id}`);
}

export function loadHoldingsDetails_Articles(id){
    return httpFile().post(`/loadHoldingsDetails_Articles/${id}`);
}

export function loadHoldingsDetails_Articles_HoldingsOnly(id){
    return httpFile().post(`/loadHoldingsDetails_Articles_HoldingsOnly/${id}`);
}

export function loadHoldingsDetails_Publisher(id){
    return httpFile().post(`/loadHoldingsDetails_Publisher/${id}`);
}

export function loadHoldings_MainAuthor(id){
    return httpFile().post(`/loadHoldings_MainAuthor/${id}`);
}

export function loadHoldings_SubAuthor(id){
    return httpFile().post(`/loadHoldings_SubAuthor/${id}`);
}

export function loadHoldingsCopy(id){
    return httpFile().post(`/loadHoldingsCopy/${id}`);
}

export function ifHas_Author(id){
    return httpFile().post(`/ifHas_Author/${id}`);
}

export function ifHas_Publisher(id){
    return httpFile().post(`/ifHas_Publisher/${id}`);
}

export function ifHas_Subject(id){
    return httpFile().post(`/ifHas_Subject/${id}`);
}

export function ifHas_File(id){
    return httpFile().post(`/ifHas_File/${id}`);
}

export function quickView_Multimedia(id){
    return httpFile().post(`/quickView_Multimedia/${id}`);
}