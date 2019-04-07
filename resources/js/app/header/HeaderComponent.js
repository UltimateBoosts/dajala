import React from 'react'
import { NavLink } from 'react-router-dom'

const Header = () => (
  <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
    <div className='container'>
      <ul className="nav nav-pills nav-fill">
        <li className="nav-item">
          <NavLink exact={true} activeClassName="active" className='nav-link' to='/'>Inventory</NavLink>
        </li>
        <li className="nav-item">
          <NavLink activeClassName="active" className='nav-link' to='/buy'>Buy</NavLink>
        </li>
        <li className="nav-item">
          <NavLink activeClassName="active" className='nav-link' to='/reports'>Reports</NavLink>
        </li>
      </ul>
    </div>
  </nav>
)

export default Header