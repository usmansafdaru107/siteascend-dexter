<?php

namespace App\Http\Requests\campaign;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clientName' => 'required|max:255',
            'campaignName' => 'required|max:255',
            'solution' => 'required|max:255',
            'solutionURL' => 'required|max:255',
            'salesRep' => 'required|max:255',
            'salesRepEmail' => 'required|email|max:255',
            'salesRepNumber' => 'required|max:255',
            'salesRepBridge' => 'required|max:255',
            'calendarAccess' => 'required|max:255',
            'calendarUsername' => 'required|max:255',
            'calendarPassword' => 'required|max:255',
            'calendarInviteAdmin' => 'required|max:255',
            'cre' => 'required|exists:users,id',
            'dsr' => 'required|exists:users,id',
            'dgr' => 'required|array|min:1',
            "dgr.*"  => "exists:users,id",
            'DGRAlias' => 'required|min:3|max:255',
            'csr' => 'required|exists:users,id',
            'CSRAlias' => 'required|min:3|max:255',
            'campaignTag' => 'required|array|min:1',
            'campaignTag.*' => 'exists:tags,id',
            'campaignStartDate' => 'required|date|date_format:Y-m-d',
            'expectedEndDate' => 'required|date|date_format:Y-m-d',
            'companies' => 'required|array|min:1',
            'companies.*' => 'exists:companies,id',
        ];
    }
}
