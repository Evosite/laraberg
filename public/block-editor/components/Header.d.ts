interface HeaderProps {
    toggleSidebar: () => void;
    sidebarOpen: boolean;
}
declare const Header: {
    ({ toggleSidebar, sidebarOpen }: HeaderProps): JSX.Element;
    Fill: any;
};
export default Header;
