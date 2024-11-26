<?php

namespace App\Http\Requests\Transactions;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class DonationCreateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', new Transaction);
    }

    public function rules()
    {
        return [
            'date' => 'required|date|date_format:Y-m-d',
            'amount' => 'required|max:60',
            'notes' => 'nullable|max:255',
            'partner_id' => 'required_without:partner_name',
            'partner_name' => 'required_without:partner_id|max:60',
            'partner_phone' => 'required_without:partner_id|max:255',
            'partner_gender_code' => 'required_without:partner_id|in:m,f',
            'book_id' => ['required', 'exists:books,id'],
            'bank_account_id' => ['nullable', 'exists:bank_accounts,id'],
        ];
    }
}
