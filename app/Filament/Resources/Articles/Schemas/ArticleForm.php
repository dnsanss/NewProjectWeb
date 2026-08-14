<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Artikel')
                    ->schema([

                        TextInput::make('title')
                            ->label('Judul Artikel')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('author_id')
                            ->label('Penulis')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload(),

                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(4)
                            ->maxLength(500)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Media')
                    ->schema([

                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('articles')
                            ->imageEditor()
                            ->required(),

                        Select::make('media_type')
                            ->label('Jenis Media')
                            ->options([
                                'image' => 'Gambar',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required()
                            ->live(),

                        TextInput::make('video_url')
                            ->label('URL Video')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->visible(
                                fn($get): bool =>
                                $get('media_type') === 'video'
                            ),

                    ])
                    ->columns(2),

                Section::make('Isi Artikel')
                    ->schema([

                        RichEditor::make('content')
                            ->label('Konten')
                            ->required()
                            ->columnSpanFull(),

                    ]),

                Section::make('Publikasi')
                    ->schema([

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('Artikel Utama')
                            ->default(false),

                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->seconds(false),

                    ])
                    ->columns(3),
            ]);
    }
}
