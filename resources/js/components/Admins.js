import React, { Component } from 'react';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import ViewAdmins from './viewAdmins';
import AddAdmin from './addAdmin';

import Sidebar from './Sidebar';

class AllAdmins extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <Route exact path="/viewAdmins">
                        <ViewAdmins />
                    </Route>
                    <Route exact path="/addadmin">
                        <AddAdmin />
                    </Route>
                </Switch>
            </Router>
        );
    }
}
 
export default AllAdmins;