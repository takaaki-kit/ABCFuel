
<?php

class Controller_Message extends Controller_Template
{
    public $template = 'timeline';

    public function action_new()
    {
        $message = Model_Message::forge();
        $message->user_id = Session::get('id');
        $message->text = Input::param('post_text');
        $message->image = 'ww';
        $message->deleted = 0;

        try {
            $message->save();
        } catch (\Orm\validationFailed $e) {
        }
        Response::redirect('/timeline');
    }
}
