<?php

Admin::menu()->url('/')->label('Старовая стрница')->icon('fa-dashboard');
Admin::menu('App\Model\Article')->label('Материалы');
Admin::menu('App\Model\Category')->label('Разделы');
Admin::menu('App\Model\Personal')->label('Работники');