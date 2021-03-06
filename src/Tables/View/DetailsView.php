<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

namespace Gibbon\Tables\View;

use Gibbon\View\View;
use Gibbon\Domain\DataSet;
use Gibbon\Tables\DataTable;
use Gibbon\Tables\Renderer\RendererInterface;

/**
 * DetailsView
 *
 * @version v20
 * @since   v20
 */
class DetailsView extends View implements RendererInterface
{
    /**
     * Render the table to HTML.
     *
     * @param DataTable $table
     * @param DataSet $dataSet
     * @return string
     */
    public function renderTable(DataTable $table, DataSet $dataSet)
    {
        $this->addData('table', $table);

        if ($dataSet->count() > 0) {
            $this->addData([
                'columns'    => $table->getColumns(),
                'rows'       => $dataSet,
                'blankSlate' => $table->getMetaData('blankSlate'),
            ]);
        }

        return $this->render('components/detailsTable.twig.html');
    }
}
